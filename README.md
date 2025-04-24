# VaderBilling by Omnilabs

A Laravel module for account billing subscriptions. Compatible with Laravel 10, 11, 12 and PHP 8.1+.

## Installation

1. Require the package via Composer:
   ```bash
   composer require omnilabs/vader-billing
   ```

2. Publish the migration and views:
   ```bash
   php artisan vendor:publish --provider="Omnilabs\\VaderBilling\\VaderBillingServiceProvider" --tag="migrations"
   php artisan vendor:publish --provider="Omnilabs\\VaderBilling\\VaderBillingServiceProvider" --tag="views"
   ```

3. Run the migration:
   ```bash
   php artisan migrate
   ```

4. Register the billing history route manually in your `routes/web.php`:
   ```php
   use Omnilabs\VaderBilling\Controllers\VaderBillingController;
   Route::middleware(['web', 'auth'])
       ->get('/billing/history', [VaderBillingController::class, 'history'])
       ->name('vader-billing.history');
   ```

5. Add the modal component to your dashboard Blade file (e.g., `resources/views/dashboard.blade.php`):
   ```php
   @php
       $pendingInvoice = app('vaderbilling')->getUserPendingInvoice(auth()->id());
   @endphp
   <x-vader-billing-modal :invoice="$pendingInvoice" />
   ```
   The modal will only appear if there is a pending invoice for the user.

## Customization
- The modal and history view use Tailwind CSS for styling. You can override the views after publishing them.

## Support
For issues, contact Omnilabs at info@omnilabs.co.za.
