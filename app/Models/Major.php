<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function users() {
        return $this->hasMany(User::class);
    }

    public function getStudentsAttribute() {
        return $this->users()->where('role', 'student')->where('status', 'active')->get();
    }

    public function getTeachersAttribute() {
        return $this->users()->where('role', 'teacher')->get();
    }
}
