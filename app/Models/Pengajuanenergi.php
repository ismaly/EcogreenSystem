<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Pengajuanenergi extends Model
{
    protected $guarded = [];
    protected $table = 'pengajuanenergi';
    public $timestamps = true;

    use Notifiable;

    public static function getYears()
    {
        return self::selectRaw('YEAR(created_at) as year')
            ->distinct()
            ->orderBy('year', 'asc')
            ->pluck('year');
    }
}
