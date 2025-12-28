<?php
/**
 * @var \Illuminate\View\View $view
 * @var \App\Models\Contact[] $contacts
 * @var string $search
 */
?>

<x-layouts.app :title="__('Contact Messages')">
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
            <flux:breadcrumbs.item>Contact Messages</flux:breadcrumbs.item>
        </flux:breadcrumbs>
    </div>

    <!-- Search Form -->
    <div class="mt-5">
        <form method="GET" action="{{ route('admin.contacts.index') }}" class="flex gap-2">
            <div class="flex-1">
                <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Search by email, first name, or last name..." class="block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-800/75 focus:border-gray-800">
            </div>
            <button type="submit" class="px-4 py-2 bg-black text-white rounded-lg hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-colors duration-200 ease-in-out">
                Search
            </button>
            @if($search)
            <a href="{{ route('admin.contacts.index') }}" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-colors duration-200 ease-in-out">
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
                            First Name
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Last Name
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Subject
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Date
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Read Status
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse($contacts as $contact)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 {{ ! $contact->is_read ? 'bg-blue-50 dark:bg-blue-900/20' : '' }}">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                            {{ $contact->f_name }}
                            @if(! $contact->is_read)
                            <span class="ml-2 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                New
                            </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                            {{ $contact->l_name }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                            {{ $contact->email }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-300">
                            {{ $contact->subject }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                            {{ $contact->created_at->format('M d, Y') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                            @if ($contact->is_read)
                            <span class="px-2 py-1 rounded-md text-green-800 bg-green-100 dark:bg-green-800 dark:text-green-200">
                                Read
                            </span>
                            @else
                            <span class="px-2 py-1 rounded-md text-red-800 bg-red-100 dark:bg-red-800 dark:text-red-200">
                                Unread
                            </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="{{ route('admin.contacts.show', $contact) }}" class="text-indigo-600 hover:text-white dark:text-indigo-400 dark:hover:text-white border border-indigo-600 hover:border-indigo-600 hover:bg-indigo-600 dark:border-indigo-400 dark:hover:border-indigo-400 dark:hover:bg-indigo-400 mr-3 px-3 py-1 rounded-md bg-transparent transition-colors duration-200 ease-in-out">
                                View
                            </a>
                            <form method="POST" action="{{ route('admin.contacts.destroy', $contact) }}" class="inline" onsubmit="return confirm('Are you sure you want to delete this contact message?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-white dark:text-red-400 dark:hover:text-white border border-red-600 hover:border-red-600 hover:bg-red-600 dark:border-red-400 dark:hover:border-red-400 dark:hover:bg-red-400 px-3 py-1 rounded-md bg-transparent transition-colors duration-200 ease-in-out">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                            No contact messages found.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="pagination px-6 py-4 border-t border-gray-200 dark:border-gray-700 flex flex-col md:flex-row justify-between items-center gap-4">
            {{ $contacts->appends(['search' => $search])->links() }}
        </div>
    </div>

    @push('scripts')
    @if (Session::has('status'))
    <x-alert :msg="Session::get('msg')" :status="Session::get('status')" />
    @endif

    <!-- Delete Confirmation Modal -->
    <x-delete-confirmation-model />

    <script>
        let currentContactId = null;

        // The delete functionality is handled by the form submission

    </script>
    @endpush
</x-layouts.app>
