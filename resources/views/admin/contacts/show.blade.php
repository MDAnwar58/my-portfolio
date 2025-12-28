<?php
/**
 * @var \Illuminate\View\View $view
 * @var \App\Models\Contact $contact
 */
?>

<x-layouts.app :title="__('Contact Message Details')">
    <div class="flex justify-between items-center">
        <flux:breadcrumbs>
            <flux:breadcrumbs.item href="/admin/dashboard" icon="home" wire:navigate />
            <flux:breadcrumbs.item :href="route('admin.contacts.index')">Contact Messages</flux:breadcrumbs.item>
            <flux:breadcrumbs.item>View</flux:breadcrumbs.item>
        </flux:breadcrumbs>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-xl shadow overflow-hidden mt-5">
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">First Name</label>
                        <div class="block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white">
                            {{ $contact->f_name }}
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Last Name</label>
                        <div class="block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white">
                            {{ $contact->l_name }}
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Email</label>
                        <div class="block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white">
                            {{ $contact->email }}
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Subject</label>
                        <div class="block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white">
                            {{ $contact->subject }}
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Date</label>
                        <div class="block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white">
                            {{ $contact->created_at->format('M d, Y g:i A') }}
                        </div>
                    </div>
                </div>

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Message</label>
                        <div class="block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white min-h-32">
                            {{ $contact->message }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex justify-between">
                <a href="{{ route('admin.contacts.index') }}" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-colors duration-200 ease-in-out">
                    Back to Messages
                </a>

                <form method="POST" action="{{ route('admin.contacts.destroy', $contact) }}" class="inline" onsubmit="return confirm('Are you sure you want to delete this contact message?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:text-white dark:text-red-400 dark:hover:text-white border border-red-600 hover:border-red-600 hover:bg-red-600 dark:border-red-400 dark:hover:border-red-400 dark:hover:bg-red-400 px-4 py-2 rounded-md bg-transparent transition-colors duration-200 ease-in-out">
                        Delete Message
                    </button>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
    @if (Session::has('status'))
    <x-alert :msg="Session::get('msg')" :status="Session::get('status')" />
    @endif

    <!-- Delete Confirmation Modal -->
    <x-delete-confirmation-model />

    <script>
        // The delete functionality is handled by the form submission

    </script>
    @endpush
</x-layouts.app>
