<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'duration',
        'price',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class,'owner_id','id');
    }
    public function sales()
    {
        return $this->belongsTo(User::class,'sale_id','id');
    }
    public function shops()
    {
        return $this->belongsTo(User::class,'shop_id','id');
    }
}
