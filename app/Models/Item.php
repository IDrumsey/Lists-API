<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Checklist;
use App\Models\User;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'user_id',
        'list_id'
    ];

    public function list(){
        return $this->hasOne(Checklist::class);
    }

    public function user(){
        return $this->hasOne(User::class);
    }
}
