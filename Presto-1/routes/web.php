<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\RevisorController;

use App\Livewire\CreateAnnouncement;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/categories/{category}', [PageController::class, 'categoryShow'])->name('category.show');
Route::get('/announcement/view/{announcement}', [AnnouncementController::class, 'showAnnouncement']) ->name('announcement.show');



Route::middleware('UserCreateAnnouncement')->group(function(){

    Route::get('/announcements/create', [AnnouncementController::class, 'create'])->name('announcements.create');


    Route::post('/request/revisor', [RevisorController::class, 'becomeRevisor'])->name('revisor.become');

    Route::get('/make/revisor/{user}', [RevisorController::class, 'makeRevisor'])->name('revisor.make');

    Route::get('/job/revisor', [RevisorController::class, 'jobRevisor'])->name('revisor.job');

});

Route::middleware('isRevisor')->group(function(){

    //*Home Revisore
    Route::get('/revisor/home', [RevisorController::class, 'index'])->name('revisor.index');

    //*Accetta annuncio
    Route::patch('/accept/announcement/{announcement}',[RevisorController::class,'acceptAnnouncement'])->name('revisor.accept_announcement');

    //*Rifiuta annuncio
    Route::patch('/rejected/announcement/{announcement}', [RevisorController::class, 'rejectAnnouncement'])->name('revisor.reject_announcement');

    //*Riporta l'annuncio in fase di revisione
    Route::patch('/torevise/announcement/{announcement}', [RevisorController::class, 'toReviseAnnouncement'])->name('revisor.torevise_announcement');

    //*Elimina l'annuncio definitivamente
    Route::delete('/todelete/announcement/{announcement}', [RevisorController::class, 'toDeleteAnnouncement'])->name('revisor.todelete_announcement');
});

Route::get('/research/announcement', [PageController::class, 'searchAnnouncements'])->name('annoucements.search');

//set lingua
Route::post('language/{lang}', [PageController::class, 'setLocale'])->name('setLocale');


//footer
Route::get('/aboutUs', [PageController::class, 'aboutUs'])->name('aboutUs');

Route::get('/contactUs', [PageController::class, 'contactUs'])->name('contactUs');

Route::get('/products', [PageController::class, 'products'])->name('products');

Route::get('/services', [PageController::class, 'services'])->name('services');

Route::get('/termAndConditions', [PageController::class, 'termAndConditions'])->name('termAndConditions');

Route::get('/privacy', [PageController::class, 'privacy'])->name('privacy');

