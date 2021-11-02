<?php

namespace App\Models;

use Core\Classes\Model;

class User extends Model
{
    public function __construct(){ parent::__construct('users'); }

    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'status',
        'role'
    ];
}
