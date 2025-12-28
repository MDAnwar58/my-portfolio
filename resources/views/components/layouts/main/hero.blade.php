<section class="hero">
    <!-- Animated Background -->
    <div class="hero-background">
        <div class="gradient-orbs">
            <div class="orb orb-1"></div>
            <div class="orb orb-2"></div>
            <div class="orb orb-3"></div>
            <div class="orb orb-4"></div>
        </div>
        <div class="particles-container">
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
        </div>
        <div class="grid-overlay"></div>
    </div>

    <!-- Hero Content -->
    <div class="hero-content">
        <div class="hero-text">
            <div class="status-badge {{ $appContent->working_for == 'not' ? 'not-available' : '' }}">
                <span class="status-dot"></span>
                {{ $appContent->working_for != 'not' ? 'Available' : 'Not Available' }} for work
            </div>

            <h1 class="hero-title">
                <span class="title-line">{{ $appContent->hero_f_title ?? 'Creative' }}</span>
                <span class="title-line highlight">{{ $appContent->hero_m_title ?? 'Developer' }}</span>
                <span class="title-line">{{ $appContent->hero_l_title ?? '& Designer' }}</span>
            </h1>

            <p class="hero-description">
                {!! $appContent->hero_short_desc !!}
            </p>

            <div class="hero-stats">
                <div class="stat">
                    <span class="stat-number" data-target="50">0</span>
                    <span class="stat-label">Projects</span>
                </div>
                <div class="stat">
                    <span class="stat-number" data-target="5">0</span>
                    <span class="stat-label">Years Exp</span>
                </div>
                <div class="stat">
                    <span class="stat-number" data-target="25">0</span>
                    <span class="stat-label">Happy Clients</span>
                </div>
            </div>

            <div class="hero-actions">
                <button class="btn btn-primary" id="openPortfolioBtn">
                    <span>View My Work</span>
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                        <path d="M8 1L15 8L8 15M15 8H1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
                <button class="btn btn-secondary" id="viewSkillsBtn">
                    <span>View Skills</span>
                </button>
                <button class="btn btn-secondary" id="openModalBtn">
                    <span>Get In Touch</span>
                </button>
            </div>

            <div class="social-links">
                @if($social_medias->count() > 0)
                @foreach($social_medias as $social_media)
                <a target="_blank" href="{{ $social_media->url }}" class="social-link">
                    @if($social_media->svg_path)
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                        <path d="{{ $social_media->svg_path }}" />
                    </svg>
                    @elseif($social_media->icon_cdn || $social_media->icon)
                    <img src="{{ $social_media->icon_cdn }}" alt="{{ $social_media->name }} icon" class="w-6 h-6 object-contain" />
                    @endif
                </a>
                @endforeach
                @endif
                {{-- <a href="#" class="social-link">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z" />
                    </svg>
                </a> --}}
                {{-- <a href="#" class="social-link">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                    </svg>
                </a>
                <a href="#" class="social-link">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
                    </svg>
                </a> --}}
            </div>
        </div>

        <div class="hero-visual">
            <div class="profile-container">
                <div class="profile-ring">
                    <div class="profile-image">
                        <img src="{{ $appContent->p_avatar }}" alt="Profile" />
                    </div>
                </div>
                <div class="floating-elements">
                    <div class="floating-card card-1">
                        <div class="card-icon">💻</div>
                        <span>{{ $appContent->feature_1 ?? 'Web Dev' }}</span>
                    </div>
                    <div class="floating-card card-2">
                        <div class="card-icon">🎨</div>
                        <span>{{ $appContent->feature_3 ?? 'UI/UX' }}</span>
                    </div>
                    <div class="floating-card card-3">
                        <div class="card-icon">⚡</div>
                        <span>{{ $appContent->feature_2 ?? 'Fast' }}</span>
                    </div>
                    <div class="floating-card card-4">
                        <div class="card-icon">🚀</div>
                        <span>{{ $appContent->feature_4 ?? 'Modern' }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="scroll-indicator">
        <div class="scroll-line"></div>
        <span>Scroll</span>
    </div>
</section>
