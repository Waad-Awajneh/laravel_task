<?php

namespace App\Models;


use App\Models\Books;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class author extends Model
{
    public function books()
    {
        return $this->hasMany(Books::class);
    }

    use HasFactory;
}
