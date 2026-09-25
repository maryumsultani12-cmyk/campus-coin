@extends('layouts.user-layout')
@section('title', 'Edit Income')
@section('heading', 'Edit Income')
@section('content')
    <div class="card-box form-card">
        <form method="POST" action="{{ url('/user/income/' . $income->id) }}">@csrf @method('PUT')
            <div class="row g-3">
                <div class="col-md-6"><label class="form-label">Income Source</label><select name="category_id"
                        class="form-select">
                        @foreach ($categories ?? [] as $category)
                            <option value="{{ $category->id }}" @selected($income->category_id == $category->id)>{{ $category->name }}</option>
                        @endforeach
                    </select></div>
                <div class="col-md-6">
                    <label class="form-label">Amount</label>
                    <input type="number" name="amount" value="{{--{{ $income->amount }}--}}" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Date</label>
                    <input type="date" name="date" value="{{--{{ $income->date }}--}}" class="form-control" required>
                </div>
                <div class="col-12">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control">{{--{{ $income->description }}--}}</textarea>
                </div>
            </div><button class="btn btn-primary mt-4">Update Income</button>
        </form>
    </div>
@endsection
