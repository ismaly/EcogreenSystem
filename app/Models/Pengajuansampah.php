<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Pengajuansampah extends Model
{
    protected $guarded = [];
    protected $table = 'pengajuansampah';
    public $timestamps = true;

    use Notifiable;

    public static function getYears()
    {
        return self::selectRaw('YEAR(created_at) as year')
            ->distinct()
            ->orderBy('year', 'asc')
            ->pluck('year');
    }
    public function getFakultasLabelAttribute()
    {
        $fakultasOptions = [
            'Ilkom' => 'Ilmu Komunikasi',
            'Tarbiyah' => 'Ilmu Tarbiyah dan Keguruan',
            'Ushuluddin' => 'Ushuluddin dan Pemikiran Islam',
            'Saintek' => 'Sains dan Teknologi',
            'Febi' => 'Ekonomi dan Bisnis Islam',
            'Syariah' => 'Syariah dan Hukum',
            'Dakwah' => 'Dakwah dan Komunikasi',
            'Adab' => 'Adab dan Humaniora',
            'Psikologi' => 'Psikologi',
            'PascaSarjana' => 'Pasca Sarjana',
            'Lainnya' => 'Lainnya',
        ];

        return $fakultasOptions[$this->attributes['fakultas']];
    }
}
