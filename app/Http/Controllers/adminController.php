<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Budget;
use App\Models\Insight;
use App\Models\Transaction;
use App\Models\User;
use App\Models\category as Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    // private function authorizeAdmin(): void
    // {
    //     abort_unless(auth()->check() && auth()->user()->role === 'admin', 403);
    // }
    public function index()
    {
        // $this->authorizeAdmin();

        $totalUsers = User::count();
        $activeUsers = User::where('role', 'user')->where('status', 'active')->count();
        $totalTransactions = Transaction::count();
        $totalCategories = Category::whereNull('user_id')->count();
        $totalBudgets = Budget::count();
        $totalInsights = Insight::count();
        $totalIncome = (float) Transaction::where('type', 'income')->sum('amount');
        $totalExpense = (float) Transaction::where('type', 'expense')->sum('amount');
        $recentUsers = User::latest()->take(8)->get();
        $recentTransactions = Transaction::with(['user', 'category'])->latest('date')->latest('id')->take(8)->get();
        $start = Carbon::today()->subDays(6);
        $end = Carbon::today();
        $daily = Transaction::query()->selectRaw('date, COUNT(*) as total')->whereBetween('date', [$start->toDateString(), $end->toDateString()])->groupBy('date')->pluck('total', 'date');
        $chartLabels = [];
        $chartData = [];
        for ($date = $start->copy(); $date->lte($end); $date->addDay()) {
            $key = $date->toDateString();
            $chartLabels[] = $date->format('M d');
            $chartData[] = (int) ($daily[$key] ?? 0);
        }
        $expenseCategories = Transaction::with('category')->selectRaw('category_id, SUM(amount) as total')->where('type', 'expense')->groupBy('category_id')->orderByDesc('total')->take(6)->get();
        foreach ($expenseCategories as $item) {
            $item->percentage = $totalExpense > 0 ? round(((float) $item->total / $totalExpense) * 100, 1) : 0;
        }
        return view('admin.dashboard', compact('totalUsers', 'activeUsers', 'totalTransactions', 'totalCategories', 'totalBudgets', 'totalInsights', 'totalIncome', 'totalExpense', 'recentUsers', 'recentTransactions', 'chartLabels', 'chartData', 'expenseCategories'));
    }
    public function users()
    {
        // $this->authorizeAdmin();

        $users = User::withCount('transactions')->latest()->get();
        $stats = [
            'total' => User::count(),
            'active' => User::where('status', 'active')->where('role', 'user')->count(),
            'disabled' => User::where('status', 'disabled')->count(),
            'admins' => User::where('role', 'admin')->count(),
        ];
        return view('admin.users.index', compact('users', 'stats'));
    }

    public function showUser(User $user)
    {
        // $this->authorizeAdmin();

        $transactionCount = $user->transactions()->count();
        $budgetCount = $user->budgets()->count();
        $insightCount = $user->insights()->count();
        $recentTransactions = $user->transactions()->with('category')->latest('date')->latest('id')->take(10)->get();
        return view('admin.users.show', compact('user', 'transactionCount', 'budgetCount', 'insightCount', 'recentTransactions'));
    }

    public function toggleUserStatus(User $user)
    {
        // $this->authorizeAdmin();

        if ($user->id === auth()->id()) {
            return back()->with('error', 'You cannot disable your own administrator account.');
        }
        $user->status = $user->status === 'active' ? 'disabled' : 'active';
        $user->save();
        return back()->with('success', 'User status updated successfully.');
    }

    public function resetUserPassword(User $user)
    {
        // $this->authorizeAdmin();

        $status = Password::sendResetLink(['email' => $user->email]);
        if ($status === Password::RESET_LINK_SENT) {
            return back()->with('success', 'Password reset link sent to the user email address.');
        }
        return back()->with('error', __($status));
    }

    public function categories()
    {
        // $this->authorizeAdmin();

        $categories = Category::whereNull('user_id')->withCount('transactions')->orderBy('type')->orderBy('name')->get();
        $incomeCategories = $categories->where('type', 'income')->count();
        $expenseCategories = $categories->where('type', 'expense')->count();
        $totalCategories = $categories->count();
        return view('admin.categories.index', compact('categories', 'incomeCategories', 'expenseCategories', 'totalCategories'));
    }

    public function storeCategory(Request $request)
    {
        // $this->authorizeAdmin();

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'type' => ['required', Rule::in(['income', 'expense'])],
        ]);
        $exists = Category::whereNull('user_id')->where('type', $data['type'])->whereRaw('LOWER(name) = ?', [strtolower($data['name'])])->exists();
        if ($exists) {
            return back()->withInput()->with('error', 'A default category with this name and type already exists.');
        }
        Category::create([
            'user_id' => null,
            'name' => $data['name'],
            'type' => $data['type'],
            'is_default' => true,
        ]);
        return redirect()->route('admin.categories')->with('success', 'Default category created successfully.');
    }

    public function editCategory(Category $category)
    {
        // $this->authorizeAdmin();
        abort_unless($category->user_id === null && $category->is_default, 404);
        return view('admin.categories.edit', compact('category'));
    }

    public function updateCategory(Request $request, Category $category)
    {
        // $this->authorizeAdmin();
        abort_unless($category->user_id === null && $category->is_default, 404);
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'type' => ['required', Rule::in(['income', 'expense'])],
        ]);
        $category->update($data);
        return redirect()->route('admin.categories')->with('success', 'Category updated successfully.');
    }

    public function destroyCategory(Category $category)
    {
        // $this->authorizeAdmin();
        abort_unless($category->user_id === null && $category->is_default, 404);
        if ($category->transactions()->exists() || $category->budgets()->exists()) {
            return back()->with('error', 'This category cannot be deleted because it is already used by transactions or budgets.');
        }
        $category->delete();
        return redirect()->route('admin.categories')->with('success', 'Category deleted successfully.');
    }

    public function announcements()
    {
        // $this->authorizeAdmin();

        $announcements = Announcement::latest()->get();
        return view('admin.announcements.index', compact('announcements'));
    }

    public function storeAnnouncement(Request $request)
    {
        // $this->authorizeAdmin();

        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string'],
            'type' => ['required', Rule::in(['announcement', 'tip'])],
        ]);
        Announcement::create([
            ...$data,
            'is_active' => true,
        ]);
        return redirect()->route('admin.announcements')->with('success', 'Template created successfully.');
    }

    public function editAnnouncement(Announcement $announcement)
    {
        // $this->authorizeAdmin();

        return view('admin.announcements.edit', compact('announcement'));
    }

    public function updateAnnouncement(Request $request, Announcement $announcement)
    {
        // $this->authorizeAdmin();

        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string'],
            'type' => ['required', Rule::in(['announcement', 'tip'])],
            'is_active' => ['required', 'boolean'],
        ]);
        $announcement->update($data);
        return redirect()->route('admin.announcements')->with('success', 'Template updated successfully.');
    }

    public function destroyAnnouncement(Announcement $announcement)
    {
        // $this->authorizeAdmin();

        $announcement->delete();
        return redirect()->route('admin.announcements')->with('success', 'Template deleted successfully.');
    }
    public function toggleUserRole(User $user)
    {
        if ($user->id === auth()->id()) {
            return back()->with('error', 'You cannot change your own administrator role.');
        }
        $user->role = $user->role === 'admin' ? 'user' : 'admin';
        $user->save();
        return back()->with('success', $user->role === 'admin' ? 'User has been promoted to administrator.' : 'Administrator role has been removed.');
    }
}
