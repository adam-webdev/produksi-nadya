<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BahanBakuKeluar extends Model
{
    use HasFactory;
    protected $table = 'bahan_baku_keluars';

    public function bahan_baku()
    {
        return $this->belongsTo(BahanBaku::class);
    }
}