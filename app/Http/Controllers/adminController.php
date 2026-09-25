<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Announcement;
// use App\Models\Budget;
use App\Models\Transaction;
// use App\Models\Insight;
use App\Models\category;


use Illuminate\Http\Request;


class adminController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $activeUsers = User::where('role', 'user')->where('status', 'active')->count();
        $totalTransactions = Transaction::count();
        $mostUsedCategory = category::withCount('transactions')->orderByDesc('transactions_count')->first();
        $recentUsers = User::latest()->take(5)->get();
        return view('admin-panel.index', compact('totalUsers', 'activeUsers', 'totalTransactions', 'mostUsedCategory', 'recentUsers'));
    }
    // users
    public function users()
    {
        $users = User::latest()->get();
        return view('admin-panel.users', compact('users'));
    }
    public function viewUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin-panel.user-view', compact('user'));
    }
    public function disableUser($id)
    {
        $user = User::findOrFail($id);
        $user->status = 'disabled';
        $user->save();
        return redirect()->back()->with('success', 'User disabled successfully.');
    }
    // category
    public function categories()
    {
        $categories = category::latest()->get();
        $incomeCategories = category::where('type', 'income')->count();
        $expenseCategories = category::where('type', 'expense')->count();
        $totalCategories = category::count();
        return view('admin-panel.category-management', compact('categories', 'incomeCategories', 'expenseCategories', 'totalCategories'));
    }
    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:income,expense',
        ]);
        category::create([
            'name' => $request->name,
            'type' => $request->type,
            'is_default' => true,
        ]);
        return redirect()->route('admin.categories')->with('success', 'Category added successfully.');
    }

    public function editCategory($id)
    {
        $category = category::findOrFail($id);
        return view('admin-panel.category-edit', compact('category'));
    }
    public function updateCategory(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:income,expense',
        ]);
        $category = category::findOrFail($id);
        $category->update([
            'name' => $request->name,
            'type' => $request->type,
        ]);
        return redirect()->route('admin.categories')->with('success', 'Category updated successfully.');
    }
    public function deleteCategory($id)
    {
        $category = category::findOrFail($id);
        if ($category->transactions()->exists() || $category->budgets()->exists()) {
            return redirect()->back()->with('error', 'This category cannot be deleted because it is being used.');
        }
        $category->delete();
        return redirect()->route('admin.categories')->with('success', 'Category deleted successfully.');
    }
    public function announcements()
    {
        $announcements = Announcement::latest()->get();
        return view('admin-panel.announcements', compact('announcements'));
    }
    public function storeAnnouncement(Request $request)
    {
        $request->validate(['title' => 'required|string|max:255', 'message' => 'required|string', 'type' => 'required|in:announcement,tip',]);
        Announcement::create(['title' => $request->title, 'message' => $request->message, 'type' => $request->type, 'is_active' => true,]);
        return redirect()->route('admin.announcements')->with('success', 'Announcement added successfully.');
    }
    public function editAnnouncement($id)
    {
        $announcement = Announcement::findOrFail($id);

        return view('admin-panel.announcement-edit', compact('announcement'));
    }
    public function updateAnnouncement(Request $request, $id)
    {
        $request->validate(['title' => 'required|string|max:255', 'message' => 'required|string', 'type' => 'required|in:announcement,tip', 'is_active' => 'required|boolean',]);
        $announcement = Announcement::findOrFail($id);
        $announcement->update(['title' => $request->title, 'message' => $request->message, 'type' => $request->type, 'is_active' => $request->is_active,]);
        return redirect()->route('admin.announcements')->with('success', 'Announcement updated successfully.');
    }
    public function deleteAnnouncement($id)
    {
        $announcement = Announcement::findOrFail($id);
        $announcement->delete();
        return redirect()->route('admin.announcements')->with('success', 'Announcement deleted successfully.');
    }
}
