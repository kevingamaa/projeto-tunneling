<?php

namespace App;

use Core\Classes\Model;

class Ticket  extends Model {
    protected $fillable = ['title', 'description', 'status'];


    
}