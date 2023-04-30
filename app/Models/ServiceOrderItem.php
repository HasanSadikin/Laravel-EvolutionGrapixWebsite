<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceOrderItem extends Model
{
    use HasFactory;

    protected $table = 'service_order_items';
    protected $guarded = ['id'];

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }
}
