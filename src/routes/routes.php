<?php
Route::middleware('web')->group(function () {
	Route::resource('settings', 'SettingsController');
});