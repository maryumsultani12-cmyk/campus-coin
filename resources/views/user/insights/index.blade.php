@extends('layouts.user-layout')
@section('title', 'Saving Tips')
@section('heading', 'Saving Tips & Insights')
@section('subtitle', 'Suggestions based on your own spending and budget history.')
@section('content')
    <div class="row g-4">
        {{-- @forelse($insights ?? [] as $insight)
            <div class="col-lg-6">
                <div class="card-box tip">
                    <div class="d-flex justify-content-between"><span
                            class="badge badge-soft">{{ $insight->month }}</span><span
                            class="muted">{{ $insight->generated_at }}</span></div>
                    <h5 class="mt-3">{{ $insight->summary_text }}</h5>
                    <p class="mb-3">{{ $insight->tip_text }}</p><a href="/user/insights/history" class="small">View
                        history</a>
                </div>
        </div>@empty<div class="col-12">
                <div class="card-box empty">Add transactions and budgets to receive personalized saving insights.</div>
            </div>
        @endforelse --}}
    </div>
@endsection
