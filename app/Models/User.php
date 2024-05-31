<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\DailyReport;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function major() {
        return $this->belongsTo(Major::class);
    }

    public function daily_reports() {
        return $this->hasMany(DailyReport::class, 'student_id', 'id');
    }

    // untuk mendapatkan URL lengkap dari foto profil pengguna
    public function getPhotoUrlAttribute() {
        if (!$this->photo) return false;
        return asset('storage/'.$this->photo);
    }

    public function last_reports() {
        return $this->hasMany(LastReport::class, 'student_id', 'id');
    }

    public function internships() {
        return $this->hasMany(Internship::class, 'student_id', 'id');
    }

    public function teacher() {
        return $this->hasOne(TeacherStudent::class, 'student_id', 'id');
    }

    public function students() {
        return $this->belongsToMany(User::class, 'teacher_students', 'teacher_id', 'student_id', 'id');
    }
    
    public function getInitialAttribute() {
        return collect(explode(' ', $this->name))->map(function($name, $index) {
            return $index < 2 ? $name[0] : '';
        })->join('');
    }

    public function getOnInternshipAttribute() {
        return $this->internships()->whereNotIn('status', ['rejected'])->first();
    }
}
