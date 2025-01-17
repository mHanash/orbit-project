<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::view('/', 'welcome')->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::prefix('portal')->middleware('auth')->group(function () {
    //routes pour compagnie aérienne
    Volt::route('/airlines', 'airline.index')->name('airline.index');
    Volt::route('/airlines/create', 'airline.create')->name('airline.create');
    Volt::route('/airlines/{id}/create', 'airline.edit')->name('airline.edit');
    //routes pour type d'avion
    Volt::route('/airplane-types', 'airplaneType.index')->name('airplaneType.index');
    Volt::route('/airplane-types/create', 'airplaneType.create')->name('airplaneType.create');
    //routes pour reseravtion
    Volt::route('/reservation', 'reservation.index')->name('reservation.index');
    //routes pour vol
    Volt::route('/flight', 'flight.index')->name('flight.index');
    Volt::route('/flight/create', 'flight.create')->name('flight.create');
});

require __DIR__ . '/auth.php';
