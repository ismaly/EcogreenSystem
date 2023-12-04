<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Carbon\Carbon;
use Illuminate\Notifications\DatabaseNotification;

class DataSampahNotification extends Notification
{
    use Queueable;
    protected $pengajuan;

    public function __construct($pengajuan)
    {
        $this->pengajuan = $pengajuan;
    }

    public function toDatabase($notifiable)
    {
        $data = $this->pengajuan;
        return [
            'message' => 'Pengajuan sampah baru oleh: ' . $data->nama . ' (NIM: ' . $data->nim . ')',
            'type' => 'insertpengajuansampah',
            'created_at' => now(),
        ];
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
    
    public function via($notifiable)
    {
        return ['database']; // Notifikasi akan dikirim melalui saluran database
    }
}