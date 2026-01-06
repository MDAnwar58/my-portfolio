<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\WorkController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\AppContentController;
use App\Http\Controllers\Admin\SocialMediaController;
use App\Http\Controllers\HomeController;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Livewire\Settings\TwoFactor;
use App\Livewire\Settings\WebViewPage;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::post('/contact', [ContactController::class, 'store_contact'])->name('contact.store');

Route::get('admin/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('admin.dashboard');


Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('admin.profile.edit');
    Route::get('settings/password', Password::class)->name('admin.user-password.edit');
    Route::get('settings/appearance', Appearance::class)->name('admin.appearance.edit');

    Route::get('settings/two-factor', TwoFactor::class)
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            )
        )
        ->name('admin.two-factor.show');

    Route::get('settings/web-view', WebViewPage::class)->name('admin.settings.web-view.edit');

    Route::get('works', [WorkController::class, 'index'])->name('admin.works.index');
    Route::get('works/add', [WorkController::class, 'create'])->name('admin.works.create');
    Route::post('work/store', [WorkController::class, 'store'])->name('admin.work.store');
    Route::get('works/{work}/edit', [WorkController::class, 'edit'])->name('admin.work.edit');
    Route::put('works/{work}', [WorkController::class, 'update'])->name('admin.work.update');
    Route::delete('works/{work}', [WorkController::class, 'destroy'])->name('admin.work.destroy');

    Route::get('skills', [SkillController::class, 'index'])->name('admin.skills.index');
    Route::get('skills/add', [SkillController::class, 'create'])->name('admin.skills.create');
    Route::post('skills', [SkillController::class, 'store'])->name('admin.skills.store');
    Route::get('skills/{skill}/edit', [SkillController::class, 'edit'])->name('admin.skills.edit');
    Route::put('skills/{skill}', [SkillController::class, 'update'])->name('admin.skills.update');
    Route::delete('skills/{skill}', [SkillController::class, 'destroy'])->name('admin.skills.destroy');

    Route::get('contacts', [AdminContactController::class, 'index'])->name('admin.contacts.index');
    Route::get('contacts/{contact}', [AdminContactController::class, 'show'])->name('admin.contacts.show');
    Route::delete('contacts/{contact}', [AdminContactController::class, 'destroy'])->name('admin.contacts.destroy');

    Route::get('app-content', [AppContentController::class, 'index'])->name('admin.app-content.index');
    Route::post('app-content', [AppContentController::class, 'store_or_update'])->name('admin.app.content.store.or.update');

    Route::get('social-media', [SocialMediaController::class, 'index'])->name('admin.social-media.index');
    Route::get('social-media/create', [SocialMediaController::class, 'create'])->name('admin.social-media.create');
    Route::post('social-media', [SocialMediaController::class, 'store'])->name('admin.social-media.store');
    Route::get('social-media/{id}/edit', [SocialMediaController::class, 'edit'])->name('admin.social-media.edit');
    Route::put('social-media/{id}', [SocialMediaController::class, 'update'])->name('admin.social-media.update');
    Route::delete('social-media/{id}', [SocialMediaController::class, 'destroy'])->name('admin.social-media.destroy');
});