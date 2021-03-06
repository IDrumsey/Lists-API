<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Item;
use App\Models\User;

class Checklist extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'user_id'
    ];

    // Gets the items for this list
    public function items(){
        return $this->hasMany(Item::class, 'list_id', 'id');
    }

    public function owner(){
        return $this->hasOne(User::class);
    }
}
