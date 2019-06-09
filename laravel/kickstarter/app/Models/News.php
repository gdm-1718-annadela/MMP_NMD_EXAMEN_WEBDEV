<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'artikel_tabel';

    protected $fillable = [
        'titel',
        'tekst',
        'excerpt',
        'slot',
    ];

}
