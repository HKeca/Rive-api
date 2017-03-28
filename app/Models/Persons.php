<?php
/* 
    Persons Model

*/

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persons extends Model
{
    protected $table = 'persons';

    protected $fillable = [
        'uid',
        'firstname',
        'lastname',
        'dob',
        'zipcode',
    ];
}