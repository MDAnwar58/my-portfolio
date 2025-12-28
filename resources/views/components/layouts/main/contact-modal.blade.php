<div class="modal-overlay" id="contactModal">
    <div class="modal-container">
        <button class="modal-close" id="closeModalBtn">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </button>

        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-icon">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                        <polyline points="22,6 12,13 2,6"></polyline>
                    </svg>
                </div>
                <h2 class="modal-title">{{ $appContent->c_title ?? "Let's Get In Touch" }}</h2>
                <p class="modal-subtitle">
                    {{ $appContent->c_short_desc ?? "Fill out the form below and I'll get back to you as
                    soon as possible." }}
                </p>
            </div>

            <form action="{{ route('contact.store') }}" method="POST" class="contact-form" id="contactForm">
                @csrf
                <div class="form-row">
                    <div class="form-group">
                        <label for="firstName">First Name</label>
                        <input type="text" id="firstName" name="f_name" placeholder="John" />
                        @error('f_name')
                        <span style="color: red; font-size: 16px; font-weight: 500;">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="lastName">Last Name</label>
                        <input type="text" id="lastName" name="l_name" placeholder="Doe" />
                        @error('l_name')
                        <span style="color: red; font-size: 16px; font-weight: 500;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="john.doe@example.com" />
                    @error('email')
                    <span style="color: red; font-size: 16px; font-weight: 500;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" id="subject" name="subject" placeholder="Project Inquiry" />
                    @error('subject')
                    <span style="color: red; font-size: 16px; font-weight: 500;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" rows="5" placeholder="Tell me about your project..."></textarea>
                    @error('message')
                    <span style="color: red; font-size: 16px; font-weight: 500;">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary submit-btn">
                    <span>Send Message</span>
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                        <path d="M15 1L1 8L6 10L15 1ZM15 1L10 15L8 10L15 1Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </form>
        </div>
    </div>
</div>

@push('script')
@if (Session::has('status'))
<x-alert :msg="Session::get('msg')" :status="Session::get('status')" />
@endif
@endpush
