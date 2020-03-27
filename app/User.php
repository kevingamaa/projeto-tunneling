<?php

namespace App;

use Core\Classes\Model;

class User  extends Model {
    protected $fillable = ['name', 'email', 'password'];

    protected $hidden = ['password'];

    
}