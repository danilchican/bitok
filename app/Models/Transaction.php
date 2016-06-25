<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */

    protected $table = 'transactions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


    protected $fillable = [
        'public_address', 'phone', 'status', 'btc_amount', 'bel_amount',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
