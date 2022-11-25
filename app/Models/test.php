<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
protected $table="test";
use HasFactory;
protected $fillable=['book_title'];
// public $timestamps = false;
}
