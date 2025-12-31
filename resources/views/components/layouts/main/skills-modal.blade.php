<div class="modal-overlay skills-modal" id="skillsModal">
    <div class="modal-container portfolio-modal-container">
        <button class="modal-close" id="closeSkillsBtn">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </button>

        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-icon">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                        <polyline points="2 17 12 22 22 17"></polyline>
                        <polyline points="2 12 12 17 22 12"></polyline>
                    </svg>
                </div>
                <h2 class="modal-title">{{ $appContent->view_s_title ?? 'My Skills' }}</h2>
                <p class="modal-subtitle">
                    {{ $appContent->view_s_desc ?? 'Technologies and tools I work with to build amazing
                    projects.' }}
                </p>
            </div>

            <div class="skills-grid">
                <!-- Skill Card -->
                @if($skills->count() > 0)
                @foreach($skills as $skill)
                <div class="skill-card">
                    <div class="skill-icon">
                        <img src="{{ $skill->url ?? $skill->image_url }}" alt="{{ $skill->name }}" />
                    </div>
                    <h3 class="skill-title">{{ $skill->name }}</h3>

                    <div class="skill-exp">
                        @php
                        $totalWeeks = 0;
                        $totalMonths = 0;
                        $years = 0;

                        $start = $skill->date_of_exp;
                        $end = now();
                        if($start){
                        $totalWeeks = $start->diffInWeeks($end);
                        $totalMonths = $start->diffInMonths($end);
                        $years = round($totalMonths / 12, 1);
                        }
                        @endphp
                        {{ $skill->name }} experience is 
                         @if($skill->date_of_exp)
                            @if($years < 1)
                            @if($totalMonths < 1)
                            {{ round($totalWeeks) .' Weeks' }}.
                            @else
                            {{ round($totalMonths) .' Months' }}.
                            @endif
                            @else
                            {{ $years .' Years' }}.
                            @endif
                            @else
                            <span class="text-gray-400">N/A.</span>
                            @endif
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
