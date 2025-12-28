<x-layouts.app :title="__('Edit Skill')">
    <flux:breadcrumbs>
        <flux:breadcrumbs.item href="/admin/dashboard" icon="home" wire:navigate />
        <flux:breadcrumbs.item href="{{ route('admin.skills.index') }}" wire:navigate>Skills</flux:breadcrumbs.item>
        <flux:breadcrumbs.item>Edit Skill</flux:breadcrumbs.item>
    </flux:breadcrumbs>

    <div class="mt-6">
        <div class=" mx-auto">
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-white mb-6">Edit Skill</h2>

                <form method="POST" action="{{ route('admin.skills.update', $skill) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="space-y-4">
                        <x-input type="text" name="name" id="name" placeholder="Enter skill name" label="Skill Name" :value="old('name', $skill->name)" required />

                        <x-input type="url" name="url" id="url" placeholder="Enter URL" label="URL (Optional)" :value="old('url', $skill->url)" />

                        <x-input type="file" name="image_url" id="image_url" label="Image (Optional)" :value="old('image_url', $skill->image_url)" />
                    </div>

                    <div class="flex items-center justify-end mt-6 gap-3">
                        <button type="submit" class="flex items-center px-4 py-2 text-sm font-medium text-white bg-black rounded-lg hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-800/75 transition-colors duration-200 ease-in-out" id="submit-button">
                            <span id="button-text">Update Skill</span>
                            <svg class="ml-2 h-6 w-6 animate-spin text-white hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" id="loading-spinner">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>
