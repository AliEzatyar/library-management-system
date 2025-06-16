<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
class User extends Eloquent implements UserInterface, RemindableInterface {

    protected $fillable = ['name', 'username', 'password', 'verification_status'];

    public $timestamps = true; // این خط را به true تغییر دهید

    use UserTrait, RemindableTrait;

    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $hidden = ['password'];

    public function getAuthPassword() {
        return $this->password;
    }
}

