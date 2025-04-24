<?php

namespace Omnilabs\VaderBilling\Services;

use Omnilabs\VaderBilling\Models\VaderBilling;

class VaderBillingService
{
    public function getUserPendingInvoice($userId = null)
    {
        $query = VaderBilling::where('status', 'pending');
        if ($userId !== null) {
            return $query->where('omniID', $userId)->first();
        }
        return $query->get();
    }

    public function getUserInvoices($userId = null)
    {
        $query = VaderBilling::orderByDesc('due_date');
        if ($userId !== null) {
            return $query->where('omniID', $userId)->get();
        }
        return $query->get();
    }
}
