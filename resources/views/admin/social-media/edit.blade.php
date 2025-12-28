<x-layouts.app :title="__('Edit Social Media')">
    <flux:breadcrumbs>
        <flux:breadcrumbs.item href="/admin/dashboard" icon="home" wire:navigate />
        <flux:breadcrumbs.item href="{{ route('admin.social-media.index') }}" wire:navigate>Social Media</flux:breadcrumbs.item>
        <flux:breadcrumbs.item>Edit Social Media</flux:breadcrumbs.item>
    </flux:breadcrumbs>

    <div class="mt-6">
        <div class=" mx-auto">
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-white mb-6">Edit Social Media</h2>

                <form method="POST" action="{{ route('admin.social-media.update', $socialMedium->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="space-y-4">
                        <x-input type="text" name="name" id="name" placeholder="Enter social media name" label="Social Media Name" :value="old('name', $socialMedium->name)" required />

                        <x-input type="text" name="icon_cdn" id="icon_cdn" placeholder="Enter CDN URL for icon" label="Icon CDN (Optional)" :value="old('icon_cdn', $socialMedium->icon_cdn)" />

                        <x-input type="text" name="svg_path" id="svg_path" placeholder="Enter SVG path for icon" label="SVG Path (Optional)" :value="old('svg_path', $socialMedium->svg_path)" />

                        @if($socialMedium->icon)
                        <div class="mb-2">
                            <p class="text-sm text-gray-600">Current icon:</p>
                            <img src="{{ $socialMedium->icon }}" alt="Current icon" class="w-12 h-12 object-contain mt-1">
                        </div>
                        @endif
                        <x-input type="file" name="icon" id="icon" label="Social Media Icon" accept="image/*" />
                        <p class="mt-1 text-sm text-gray-500">Upload a new image file (JPEG, PNG, JPG, GIF, SVG). Max size: 2MB. Leave empty to keep current icon.</p>

                        <x-input type="url" name="url" id="url" placeholder="Enter URL" label="URL" :value="old('url', $socialMedium->url)" required />
                    </div>

                    <div class="flex items-center justify-end mt-6 gap-3">
                        <button type="submit" class="flex items-center px-4 py-2 text-sm font-medium text-white bg-black rounded-lg hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-800/75 transition-colors duration-200 ease-in-out" id="submit-button">
                            <span id="button-text">Update Social Media</span>
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
