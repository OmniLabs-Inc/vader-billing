<?php

namespace Omnilabs\VaderBilling\View\Components;

use Illuminate\View\Component;

class VaderBillingModal extends Component
{
    public $invoice;

    public function __construct($invoice = null)
    {
        $this->invoice = $invoice;
    }

    public function render()
    {
        return view('vader-billing::components.vader-billing-modal');
    }
}
