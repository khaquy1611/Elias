<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Customer extends  Authenticatable
{
	use Notifiable;
	protected $primarykey='id';
	protected $table = 'customers';
    protected $fillable = ['name','email','phone','address','password'];
}

