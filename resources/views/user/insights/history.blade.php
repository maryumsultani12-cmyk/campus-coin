@extends('layouts.user-layout')
@section('title', 'Insight History')
@section('heading', 'Insight History')
@section('subtitle', 'Review your previous monthly spending insights.')
@section('content')
    <div class="row g-3">
        {{-- @forelse($insights ?? [] as $insight)
            <div class="col-12">
                <div class="card-box">
                    <div class="d-flex justify-content-between mb-2"><strong>{{ $insight->month }}</strong><span
                            class="muted">{{ $insight->generated_at }}</span></div>
                    <p class="mb-2">{{ $insight->summary_text }}</p>
                    <p class="muted mb-0">{{ $insight->tip_text }}</p>
                </div>
        </div>@empty<div class="col-12">
                <div class="card-box empty">No insight history yet.</div>
            </div>
        @endforelse --}}
    </div>
@endsection
