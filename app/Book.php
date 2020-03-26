<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
     //指定表明
     protected $table='book';
     //指定主见id
     protected $primaryKey='book_id';
}
