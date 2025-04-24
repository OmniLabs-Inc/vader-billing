<?php

namespace Omnilabs\VaderBilling\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Omnilabs\VaderBilling\Services\VaderBillingService;

class VaderBillingController extends Controller
{
    protected $billingService;

    public function __construct(VaderBillingService $billingService)
    {
        $this->billingService = $billingService;
    }

    public function history(Request $request)
    {
        $userId = $request->user()->id;
        $invoices = $this->billingService->getUserInvoices($userId);
        return view('vader-billing::vader-billing-history', compact('invoices'));
    }
}
