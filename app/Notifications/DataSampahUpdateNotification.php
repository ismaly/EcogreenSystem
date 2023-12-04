<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Carbon\Carbon;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\Messages\DatabaseMessage;

class DataSampahUpdateNotification extends Notification
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
            'message' => 'Perubahan data pengajuan sampah oleh: ' . $data->nama . ' (NIM: ' . $data->nim . ')',
            'type' => 'updatepengajuansampah',
            'created_at' => now(),
            'id' => $notifiable->id, // Gunakan ID notifiable (User) sebagai referensi
        ];
    }

     // Implementasikan metode via() untuk menentukan saluran notifikasi
     public function via($notifiable)
     {
         return ['database']; // Contoh: Notifikasi akan dikirim melalui saluran database
     }
}
