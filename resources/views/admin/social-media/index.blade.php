<x-layouts.app :title="__('Social Media')">
    @push('css')
    <style>
        .pagination nav:last-child {
            width: 100%;
        }

    </style>
    @endpush
    <div class="flex justify-between items-center">
        <flux:breadcrumbs>
            <flux:breadcrumbs.item href="/admin/dashboard" icon="home" wire:navigate />
            <flux:breadcrumbs.item>Social Media</flux:breadcrumbs.item>
        </flux:breadcrumbs>

        <flux:link href="{{ route('admin.social-media.create') }}" wire:navigate class="px-4 py-2 bg-black text-white rounded-lg hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-colors duration-200 ease-in-out" style="text-decoration: none;">
            Add New Social Media
        </flux:link>
    </div>

    <!-- Search Form -->
    <div class="mt-5">
        <form method="GET" action="{{ route('admin.social-media.index') }}" class="flex gap-2">
            <div class="flex-1">
                <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Search social media..." class="block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-800/75 focus:border-gray-800">
            </div>
            <button type="submit" class="px-4 py-2 bg-black text-white rounded-lg hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-colors duration-200 ease-in-out">
                Search
            </button>
            @if($search)
            <a href="{{ route('admin.social-media.index') }}" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-colors duration-200 ease-in-out">
                Clear
            </a>
            @endif
        </form>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-xl shadow overflow-hidden mt-5">
        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Icon CDN
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Icon Svg
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Icon
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            URL
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse($socialMedia as $media)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                            {{ $media->name }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                            @if($media->icon_cdn)
                            <img src="{{ $media->icon_cdn }}" alt="{{ $media->name }} icon" class="w-8 h-8 object-contain">
                            @else
                            <span class="text-gray-500">No cdn icon</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                            @if($media->svg_path)
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                <path d="{{ $media->svg_path }}" />
                            </svg>
                            @else
                            <span class="text-gray-500">No svg icon</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                            @if($media->icon)
                            <img src="{{ $media->icon }}" alt="{{ $media->name }} icon" class="w-8 h-8 object-contain">
                            @else
                            <span class="text-gray-500">No image icon</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                            <a href="{{ $media->url }}" target="_blank" class="text-blue-600 hover:text-blue-900">{{ $media->url }}</a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="{{ route('admin.social-media.edit', $media->id) }}" class="text-indigo-600 hover:text-white dark:text-indigo-400 dark:hover:text-white border border-indigo-600 hover:border-indigo-600 hover:bg-indigo-600 dark:border-indigo-400 dark:hover:border-indigo-400 dark:hover:bg-indigo-400 mr-3 px-3 py-1 rounded-md bg-transparent transition-colors duration-200 ease-in-out">
                                Edit
                            </a>
                            <button type="button" class="text-red-600 hover:text-white dark:text-red-400 dark:hover:text-white border border-red-600 hover:border-red-600 hover:bg-red-600 dark:border-red-400 dark:hover:border-red-400 dark:hover:bg-red-400 px-3 py-1 rounded-md bg-transparent transition-colors duration-200 ease-in-out" data-delete-social-media="{{ $media->id }}">
                                Delete
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                            No social media found.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="pagination px-6 py-4 border-t border-gray-200 dark:border-gray-700 flex flex-col md:flex-row justify-between items-center gap-4">
            {{ $socialMedia->appends(['search' => $search])->links() }}
        </div>
    </div>
    @push('scripts')
    @if (Session::has('status'))
    <x-alert :msg="Session::get('msg')" :status="Session::get('status')" />
    @endif

    <!-- Delete Confirmation Modal -->
    <x-delete-confirmation-model />

    <script>
        let currentSocialMediaId = null;

        function openDeleteModal(socialMediaId) {
            currentSocialMediaId = socialMediaId;

            // Get social media details from the table row
            const row = $(`[data-delete-social-media="${socialMediaId}"]`).closest('tr');
            const socialMediaName = row.find('td:first').text().trim();

            // Update modal with social media details
            $('#socialMediaName').text('Name: ' + socialMediaName);

            $('#deleteForm').attr('action', '{{ route("admin.social-media.destroy", "__id__") }}'.replace('__id__', socialMediaId));

            // Store the current search query to maintain it after deletion
            const currentUrl = new URL(window.location);
            const searchParam = currentUrl.searchParams.get('search');
            if (searchParam) {
                $('#deleteForm').append('<input type="hidden" name="search" value="' + searchParam + '" />');
            }

            $('#deleteModal').removeClass('hidden');
            $('body').css('overflow', 'hidden');
        }

        function closeDeleteModal() {
            $('#deleteModal').addClass('hidden');
            $('body').css('overflow', 'auto');
            currentSocialMediaId = null;
        }

        // Close modal when clicking outside the modal content
        $(document).on('click', '#deleteModal', function(event) {
            if (event.target === this) {
                closeDeleteModal();
            }
        });

        // Handle delete button clicks
        $(document).on('click', '[data-delete-social-media]', function() {
            const socialMediaId = $(this).data('delete-social-media');
            openDeleteModal(socialMediaId);
        });

        // Handle cancel button click
        $(document).on('click', '[data-cancel-delete]', function() {
            closeDeleteModal();
        });

    </script>
    @endpush
</x-layouts.app>
