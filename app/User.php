<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function teacher()
{
    return $this->hasOne(Teacher::class);
}

public function student()
{
    return $this->hasOne(Student::class);
}
}
