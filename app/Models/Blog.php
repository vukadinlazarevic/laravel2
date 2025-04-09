<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public function komentari() {
        return $this->hasMany(Komentar::class);
    }


    // u blade fajlu ispisujemo blogove
    // ako zelimo da prikazemo komentare tog bloga

    // $blog->komentari -> ovo nam omogucava da dobijemo sve komentare za izabrani blog, bez da pisemo sql upit
}
