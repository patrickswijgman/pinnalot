<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SettingsUser extends Model
{
    protected $fillable = ['user_id', 'primary_color', 'accent_color', 'landing_page'];
}
