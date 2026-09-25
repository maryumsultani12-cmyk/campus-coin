@extends('layouts.admin-layout')
@section('content')
<div class="container">
    <h3>{{ $user->name }}</h3>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Joined:</strong> {{ $user->created_at->format('M d, Y') }}</p>
    <p><strong>Role:</strong> {{ $user->role }}</p>
</div>
@endsection