<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\book;
class book extends Model
{
	protected $table ='book';
	protected $fillable = [
         'title',
        'description',
        'author'
    ];
}
