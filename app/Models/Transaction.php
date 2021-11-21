<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    const STATUSES = [
        'success' => 'Success',
        'failed' => 'Failed',
        'processing' => 'Processing',
    ];

    protected $guarded = [];

    protected $casts = [
        'amount' => \Naykel\Gotime\Casts\CurrencyCast::class,
        'date' => \Naykel\Gotime\Casts\DateCast::class,
        'expires_at' => \Naykel\Gotime\Casts\DateCast::class,
    ];

    // public function getDueDateForHumansAttribute()
    // {
    //     return optional($this->due_date)->format(config('naykel.date_format'));
    // }
}
