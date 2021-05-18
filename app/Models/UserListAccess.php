<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserListAccess extends Model
{
    use HasFactory;

    protected $fillable = [
        'list_id',
        'user_id'
    ];
}
