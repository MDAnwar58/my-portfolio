<div class="flex aspect-square size-8 items-center justify-center rounded-md bg-gradient-to-r from-gray-700 to-gray-800 text-white">
    <x-app-logo-icon class="size-5 fill-current text-white" />
</div>
@if(!Route::is('login') && !Route::is('register') && !url('forgot-password') && !url('reset-password'))
<div class="ms-1 grid flex-1 text-start text-sm">
    <span class="mb-0.5 truncate leading-tight font-semibold">My Portfolio</span>
</div>
@endif
