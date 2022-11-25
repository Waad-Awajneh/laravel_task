<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Books extends Model
{

    public function author()
    {
        return $this->belongsTo(author::class);
    }

    use HasFactory,SoftDeletes;

protected $fillable=['book_auther','book_description','book_title','author_id'];
protected $guarded=['book_image'];
    // public $timestamps = false;
}
