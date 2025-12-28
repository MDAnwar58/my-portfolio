<x-layouts.app :title="__('Edit Work')">
    <div class="flex justify-between items-center mb-6">
        <flux:breadcrumbs>
            <flux:breadcrumbs.item href="/admin/dashboard" icon="home" wire:navigate />
            <flux:breadcrumbs.item href="{{ route('admin.works.index') }}" wire:navigate>Works</flux:breadcrumbs.item>
            <flux:breadcrumbs.item>Edit Work</flux:breadcrumbs.item>
        </flux:breadcrumbs>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-xl shadow overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Edit Work</h2>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Update the details below for this work in your portfolio.</p>
        </div>

        <form method="POST" action="{{ route('admin.work.update', $work) }}" class="px-6 py-6" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <x-input type="text" name="name" id="name" placeholder="Enter work name" label="Work Name" value="{{ old('name', $work->name) }}" />

                <x-select name="type" id="type" label="Work Type" placeholder="Select type" :options="[
                        'web app' => 'Web Application',
                        'mobile app' => 'Mobile App',
                        'desktop app' => 'Desktop App',
                        'ui/ux design' => 'UI/UX Design',
                        'other' => 'Other'
                    ]" value="{{ old('type', $work->type) }}" />
            </div>

            <x-textarea name="short_desc" id="short_desc" placeholder="Briefly describe this work..." label="Short Description" rows="3" value="{{ old('short_desc', $work->short_desc) }}" />

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6 mt-6">
                <x-input type="url" name="live_demo_link" id="live_demo_link" placeholder="https://example.com" label="Live Demo Link" value="{{ old('live_demo_link', $work->live_demo_link) }}" />

                <x-input type="url" name="github_link" id="github_link" placeholder="https://github.com/username/repo" label="GitHub Link" value="{{ old('github_link', $work->github_link) }}" />
            </div>

            <div class="mb-6">
                <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Work Image</label>
                <input type="file" name="image" id="image" class="block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-800/75 focus:border-gray-800">
                @error('image')
                <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>

            <x-textarea name="more_info" id="more_info" placeholder="Provide additional details about this work..." label="More Information" rows="10" value="{{ old('more_info', $work->more_info) }}" dangerousHtml></x-textarea>

            <div class="flex justify-end gap-3 mt-5">
                <a href="{{ route('admin.works.index') }}" class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-200 bg-gray-100 dark:bg-gray-700 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-800/75">
                    Cancel
                </a>
                <button type="submit" class="flex items-center px-4 py-2 text-sm font-medium text-white bg-black rounded-lg hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-800/75 transition-colors duration-200 ease-in-out" id="submit-button">
                    <span id="button-text">Save Work</span>
                    <svg class="ml-2 h-6 w-6 animate-spin text-white hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" id="loading-spinner">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </button>
            </div>
        </form>


        <!-- Summernote Editor -->
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/dompurify@2.3.8/dist/purify.min.js"></script>
        <script>
            function sendFile(file, editor) {
                // This is a placeholder function for handling image uploads
                // In a real implementation, you would upload the file to your server
                // and then insert the URL into the editor
                // For now, we'll just show an alert
                alert('Image upload functionality would be implemented here');
            }
            $(document).ready(function() {
                setTimeout(function() {
                    $('#more_info').summernote({
                        placeholder: 'Provide additional details about this work...'
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
                        , onImageUpload: function(files) {
                            sendFile(files[0], $(this));
                        }
                    });
                }, 50);
            });

        </script>
</x-layouts.app>
