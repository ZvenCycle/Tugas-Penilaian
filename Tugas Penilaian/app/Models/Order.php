<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

 protected $table = 'orders'; // nama tabel di database

    protected $fillable = [
        'user_id',
        'order_id', 
        'customer_name',
        'customer_email',
        'customer_phone',
        'menu_item',
        'quantity',
        'price',
        'total_amount',
        'delivery_option',
        'address',
        'notes',
        'order_date',
        'status'
    ];


    protected $casts = [
        'order_date'   => 'datetime',
        'price'        => 'decimal:2',
        'total_amount' => 'decimal:2'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeToday($query)
    {
        return $query->whereDate('created_at', today());
    }

    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }
}
