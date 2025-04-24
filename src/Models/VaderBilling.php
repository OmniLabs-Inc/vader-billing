<?php

namespace Omnilabs\VaderBilling\Models;

use Illuminate\Database\Eloquent\Model;

class VaderBilling extends Model
{
    protected $table = 'vader_billing';

    protected $fillable = [
        'invoice_number',
        'amount',
        'description',
        'due_date',
        'status',
        'omniID',
        'currency',
    ];
}
