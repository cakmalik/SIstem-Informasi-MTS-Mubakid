<?php

namespace App\Models;

use App\Models\Grade;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends Model
{
    use HasFactory;

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }
}
