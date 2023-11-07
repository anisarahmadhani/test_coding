<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stor extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function sampah()
    {
        //untuk data one to one
        return $this->belongsTo(Sampah::class);
    }
}
