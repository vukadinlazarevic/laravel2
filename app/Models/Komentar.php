<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    public function blog() {
        return $this->belongsTo(Blog::class);
    }
}
