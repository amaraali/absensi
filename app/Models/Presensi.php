<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory, HasUuids;
    protected $table = 'presensi';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
