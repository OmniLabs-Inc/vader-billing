<?php

use Illuminate\Support\Facades\Route;
use Omnilabs\VaderBilling\Controllers\VaderBillingController;

// To be imported manually by the user in their routes/web.php
Route::middleware(['web', 'auth'])
    ->get('/billing/history', [VaderBillingController::class, 'history'])
    ->name('vader-billing.history');
