@php
use Illuminate\Support\Str;
@endphp

<x-layouts.app :title="__('Works')">
    @push('css')
    <style>
        .pagination nav:last-child {
            width: 100% !important;
        }

    </style>
    @endpush
    <div class="flex justify-between items-center">
        <flux:breadcrumbs>
            <flux:breadcrumbs.item href="/admin/dashboard" icon="home" wire:navigate />
            <flux:breadcrumbs.item>Works</flux:breadcrumbs.item>
        </flux:breadcrumbs>

        <flux:link href="{{ route('admin.works.create') }}" wire:navigate class="px-4 py-2 bg-black text-white rounded-lg hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-colors duration-200 ease-in-out" style="text-decoration: none;">
            Add New Work
        </flux:link>
    </div>

    <!-- Search Form -->
    <div class="mt-5">
        <form method="GET" action="{{ route('admin.works.index') }}" class="flex gap-2">
            <div class="flex-1">
                <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Search works..." class="block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-800/75 focus:border-gray-800">
            </div>
            <button type="submit" class="px-4 py-2 bg-black text-white rounded-lg hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-colors duration-200 ease-in-out">
                Search
            </button>
            @if($search)
            <a href="{{ route('admin.works.index') }}" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-colors duration-200 ease-in-out">
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
                            Image
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Type
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Short Description
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Links
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse($works as $work)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                            @if($work->image)
                            <img src="{{ $work->image }}" alt="{{ $work->name }}" class="w-16 h-16 object-cover rounded-md">
                            @else
                            <span class="text-gray-400">No Image</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                            {{ $work->name }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                            {{ ucfirst($work->type) }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-300">
                            {{ Str::limit($work->short_desc, 50) }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                            @if($work->live_demo_link)
                            <a href="{{ $work->live_demo_link }}" target="_blank" class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300">Demo</a>
                            @endif
                            @if($work->github_link)
                            <a href="{{ $work->github_link }}" target="_blank" class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300 ml-2">GitHub</a>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="{{ route('admin.work.edit', $work) }}" class="text-indigo-600 hover:text-white dark:text-indigo-400 dark:hover:text-white border border-indigo-600 hover:border-indigo-600 hover:bg-indigo-600 dark:border-indigo-400 dark:hover:border-indigo-400 dark:hover:bg-indigo-400 mr-3 px-3 py-1 rounded-md bg-transparent transition-colors duration-200 ease-in-out">
                                Edit
                            </a>
                            <button type="button" class="text-red-600 hover:text-white dark:text-red-400 dark:hover:text-white border border-red-600 hover:border-red-600 hover:bg-red-600 dark:border-red-400 dark:hover:border-red-400 dark:hover:bg-red-400 px-3 py-1 rounded-md bg-transparent transition-colors duration-200 ease-in-out" data-delete-work="{{ $work->id }}">
                                Delete
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                            No works found.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="pagination px-6 py-4 border-t border-gray-200 dark:border-gray-700 flex flex-col md:flex-row justify-between items-center gap-4">
            {{ $works->appends(['search' => $search])->links() }}
        </div>
    </div>
    @push('scripts')
    @if (Session::has('status'))
    <x-alert :msg="Session::get('msg')" :status="Session::get('status')" />
    @endif

    <!-- Delete Confirmation Modal -->
    <x-delete-confirmation-model />

    <script>
        let currentWorkId = null;

        function openDeleteModal(workId) {
            currentWorkId = workId;

            // Get work details from the table row
            const row = $(`[data-delete-work="${workId}"]`).closest('tr');
            const workName = row.find('td:first').text().trim();
            const workType = row.find('td:nth-child(2)').text().trim();

            // Update modal with work details
            $('#workName').text('Name: ' + workName);
            $('#workType').text('Type: ' + workType);

            $('#deleteForm').attr('action', '/admin/works/' + workId);
            $('#deleteModal').removeClass('hidden');
            $('body').css('overflow', 'hidden');
        }

        function closeDeleteModal() {
            $('#deleteModal').addClass('hidden');
            $('body').css('overflow', 'auto');
            currentWorkId = null;
        }

        // Close modal when clicking outside the modal content
        $(document).on('click', '#deleteModal', function(event) {
            if (event.target === this) {
                closeDeleteModal();
            }
        });

        // Handle delete button clicks
        $(document).on('click', '[data-delete-work]', function() {
            const workId = $(this).data('delete-work');
            openDeleteModal(workId);
        });

        // Handle cancel button click
        $(document).on('click', '[data-cancel-delete]', function() {
            closeDeleteModal();
        });

    </script>
    @endpush
</x-layouts.app>
