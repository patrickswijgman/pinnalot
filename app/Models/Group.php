<?php

namespace App\Models;

use NeoEloquent;

class Group extends NeoEloquent{
    protected $connection = 'neo4j';
    protected $label = 'Group';
    protected $fillable = ['name', 'description', 'kind'];

}
