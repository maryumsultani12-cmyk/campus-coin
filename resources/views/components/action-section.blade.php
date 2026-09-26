<div {{ $attributes->merge(['class' => 'action-section-wrapper mx-5 my-5']) }}>
    <div class="action-section-card">
        <div class="action-section-header">
            <h2 class="action-section-title">{{ $title }}</h2>
            <p class="action-section-description">{{ $description }}</p>
        </div>

        <div class="action-section-content">
            {{ $content }}
        </div>
    </div>
</div>