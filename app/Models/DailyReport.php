<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyReport extends Model
{
    use HasFactory;
    protected $guarded = [];

    // untuk menampilkan nama hari dalam bahasa Indonesia
    public function getDayAttribute() {
        $days = ['Sun' => 'Minggu', 'Mon' => 'Senin', 'Tue' => 'Selasa', 'Wed' => 'Rabu', 'Thu' => 'Kamis', 'Fri' => "Jum'at", 'Sat' => 'Sabtu'];
        return $days[date('D', strtotime($this->date))];
    }

    // untuk mengubah format tanggal yang tersimpan dalam database
    public function getDateDisplayAttribute() {
        return date('d/m/Y', strtotime($this->date));
    }

    // untuk mengubah format waktu awal
    public function getStartDisplayAttribute() {
        return date('H:i', strtotime($this->start));
    }

    // untuk mengubah format waktu akhir
    public function getEndDisplayAttribute() {
        return date('H:i', strtotime($this->end));
    }

    // untuk menghasilkan URL yang bisa diakses melalui web untuk foto yang tersimpan di direktori storage pada server
    public function getPhotoUrlAttribute() {
        return asset('storage/'.$this->photo);
    }
}
