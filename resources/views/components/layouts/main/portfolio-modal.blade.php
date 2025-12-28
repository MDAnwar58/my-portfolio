<div class="modal-overlay portfolio-modal" id="portfolioModal">
    <div class="modal-container portfolio-modal-container">
        <button class="modal-close" id="closePortfolioBtn">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </button>

        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-icon">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="2" y="3" width="20" height="14" rx="2"></rect>
                        <line x1="8" y1="21" x2="16" y2="21"></line>
                        <line x1="12" y1="17" x2="12" y2="21"></line>
                    </svg>
                </div>
                <h2 class="modal-title">{{ $appContent->view_p_title ?? 'My Portfolio' }}</h2>
                <p class="modal-subtitle">
                    {{ $appContent->view_p_desc ?? 'Check out some of my recent projects and creative
                    work.' }}
                </p>
            </div>

            <div class="portfolio-grid">
                @if($works->count() > 0)
                @foreach($works as $work)
                <div class="project-card">
                    <div class="project-image">
                        @if($work->image)
                        <img src="{{ $work->image }}" alt="{{ $work->name }}" />
                        @else
                        <div>
                            <img src="{{ asset('thumbnal.png') }}" alt="{{ $work->name }}" />
                        </div>
                        @endif
                        <div class="project-overlay">
                            <span class="project-category">{{ $work->type }}</span>
                        </div>
                    </div>
                    <div class="project-info">
                        <h3 class="project-title">
                            {{ $work->name }}
                        </h3>
                        <p class="project-description">
                            {{ $work->short_desc }}
                        </p>
                        <div class="project-links">
                            @if($work->live_demo_link)
                            <a href="{{ $work->live_demo_link }}" target="_blank" class="project-link" title="Live Demo">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
                                    <polyline points="15 3 21 3 21 9"></polyline>
                                    <line x1="10" y1="14" x2="21" y2="3"></line>
                                </svg>
                            </a>
                            @endif
                            @if($work->github_link)
                            <a href="{{ $work->github_link }}" target="_blank" class="project-link" title="GitHub">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
                                </svg>
                            </a>
                            @endif
                            @if($work->more_info)
                            <button type="button" data-id="{{ $work->id }}" class="project-link more-info-open-modal-btn" title="More Info">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="12" y1="16" x2="12" y2="12"></line>
                                    <line x1="12" y1="8" x2="12.01" y2="8"></line>
                                </svg>
                            </button>
                            @endif
                        </div>
                    </div>
                </div>
                <div id="more-info-content-{{ $work->id }}" style="display: none;">
                    {!! $work->more_info !!}
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
