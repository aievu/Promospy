<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Rule extends Model
{
    protected $table = 'rules';

    protected $fillable = [
        'name',
        // 'description',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_rules');
    }
}
