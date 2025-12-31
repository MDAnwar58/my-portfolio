<x-layouts.app :title="__('Create App Content')">
    @push('css')
    <!-- Summernote Editor -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    @endpush

    <div class="flex justify-between items-center mb-6">
        <flux:breadcrumbs>
            <flux:breadcrumbs.item href="/admin/dashboard" icon="home" wire:navigate />
            <flux:breadcrumbs.item href="{{ route('admin.app-content.index') }}" wire:navigate>App Content</flux:breadcrumbs.item>
        </flux:breadcrumbs>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-xl shadow overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-white">App Content Create And Edit</h2>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Fill in the details below to create and edit app content.</p>
        </div>

        <form method="POST" action="{{ route('admin.app.content.store.or.update') }}" class="px-6 py-6" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <x-input type="text" name="hero_f_title" id="hero_f_title" label="Hero First Title" value="{{ $appContent->hero_f_title ?? '' }}" />

                <x-input type="text" name="hero_m_title" id="hero_m_title" label="Hero Middle Title" value="{{ $appContent->hero_m_title ?? '' }}" />

                <x-input type="text" name="hero_l_title" id="hero_l_title" label="Hero Last Title" value="{{ $appContent->hero_l_title ?? '' }}" dangerousHtml />

                <x-input type="date" name="exp_duration" id="exp_duration" label="Experience Duration" value="{{ $appContent->exp_duration ? $appContent->exp_duration->format('Y-m-d') : '' }}" />

                <x-input type="number" name="projects_count" id="projects_count" label="Projects Count" value="{{ $appContent->projects_count ?? '' }}" />

                <x-input type="number" name="happy_client" id="happy_client" label="Happy Clients" value="{{ $appContent->happy_client ?? '' }}" />

                <x-input type="text" name="feature_1" id="feature_1" label="Feature 1" value="{{ $appContent->feature_1 ?? '' }}" />

                <x-input type="text" name="feature_2" id="feature_2" label="Feature 2" value="{{ $appContent->feature_2 ?? '' }}" />

                <x-input type="text" name="feature_3" id="feature_3" label="Feature 3" value="{{ $appContent->feature_3 ?? '' }}" />

                <x-input type="text" name="feature_4" id="feature_4" label="Feature 4" value="{{ $appContent->feature_4 ?? '' }}" />

                <x-input type="text" name="view_w_title" id="view_w_title" label="View Work Title" value="{{ $appContent->view_w_title ?? '' }}" dangerousHtml />

                <x-textarea name="view_w_short_desc" id="view_w_short_desc" placeholder="View Work Short Description" label="View Work Short Description" rows="4" value="{{ $appContent->view_w_short_desc ?? '' }}" dangerousHtml />

                <x-input type="text" name="view_s_title" id="view_s_title" label="View Skill Title" value="{{ $appContent->view_s_title ?? '' }}" dangerousHtml />

                <x-textarea name="view_s_short_desc" id="view_s_short_desc" placeholder="View Skill Short Description" label="View Skill Short Description" rows="4" value="{{ $appContent->view_s_short_desc ?? '' }}" dangerousHtml />

                <x-input type="text" name="c_title" id="c_title" label="Contact Title" value="{{ $appContent->c_title ?? '' }}" dangerousHtml />

                <x-textarea name="c_short_desc" id="c_short_desc" placeholder="Contact Short Description" label="Contact Short Description" rows="4" value="{{ $appContent->c_short_desc ?? '' }}" dangerousHtml />

                <x-input type="file" name="p_avatar" id="p_avatar" label="Profile Avatar" />

                <!-- Preview for Profile Avatar -->
                <div class="mt-4" id="avatar-preview-container" style="
                @if($appContent?->p_avatar == '') 
                    display: none;
                @endif
                ">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Preview:</label>
                    <div class="relative inline-block">
                        <img id="avatar-preview" src="{{ $appContent->p_avatar ?? '' }}" alt="Avatar Preview" class="w-32 h-32 object-cover rounded-full border-2 border-gray-300" />
                        <button type="button" id="remove-avatar" class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full p-1 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <x-select name="working_for" id="working_for" wrapperClass="pb-6" label="Work For" placeholder="" :options="[
                        'available' => 'Available',
                        'not' => 'Not Available',
                    ]" value="{{ $appContent->working_for ?? '' }}" />

            <div class="mb-6">
                <x-textarea name="hero_short_desc" id="hero_short_desc" placeholder="Provide short description about your app..." label="Short Description" rows="10" value="{{ $appContent->hero_short_desc ?? '' }}" dangerousHtml />
            </div>

            <div class="flex justify-end gap-3 mt-5">
                <button type="submit" class="flex items-center px-4 py-2 text-sm font-medium text-white bg-black rounded-lg hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-800/75 transition-colors duration-200 ease-in-out" id="submit-button">
                    <span id="button-text">
                        @if($appContent)
                        Update
                        @else
                        Create
                        @endif
                        Content</span>
                    <svg class="ml-2 h-6 w-6 animate-spin text-white hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" id="loading-spinner">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </button>
            </div>
        </form>


        <!-- Summernote Editor -->
        @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
        <script>
            $(document).ready(function() {
                setTimeout(function() {
                    $('#hero_short_desc').summernote({
                        placeholder: 'Provide short description about your app...'
                        , tabsize: 2
                        , height: 300
                        , toolbar: [
                            ['style', ['style']]
                            , ['font', ['bold', 'underline', 'clear']]
                            , ['color', ['color']]
                            , ['para', ['ul', 'ol', 'paragraph']]
                            , ['table', ['table']]
                            , ['insert', ['link', 'picture', 'video']]
                            , ['view', ['fullscreen', 'codeview', 'help']]
                        ]
                        , styleTags: ['p', 'blockquote', 'pre', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6']
                        //, callbacks: {
                        //    onInit: function() {
                        //        // Set initial content if needed
                        //        const initialValue = $('#hero_short_desc').val();
                        //        if (initialValue) {
                        //            $('#hero_short_desc').summernote('code', initialValue);
                        //        }
                        //    }
                        //}
                    });
                }, 50);

                // Handle profile avatar file selection and preview
                $('#p_avatar').on('change', function() {
                    const file = this.files[0];
                    if (file) {
                        const reader = new FileReader();

                        reader.onload = function(e) {
                            $('#avatar-preview').attr('src', e.target.result);
                            $('#avatar-preview-container').show();
                        };

                        reader.readAsDataURL(file);
                    } else {
                        $('#avatar-preview-container').hide();
                        $('#avatar-preview').attr('src', '');
                    }
                });

                // Handle remove avatar button click
                $('#remove-avatar').on('click', function() {
                    $('#avatar-preview-container').hide();
                    $('#avatar-preview').attr('src', '');
                    $('#p_avatar')[0].value = '';
                });
            });

        </script>
        @endpush
    </div>
</x-layouts.app>
