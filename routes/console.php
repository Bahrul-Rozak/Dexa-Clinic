<?php

use App\Models\MedicalRecord;
use App\Services\TelegramService;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('queue:send-reminder', function (TelegramService $telegram) {
    Log::info('Scheduler queue:send-reminder started');

    $queues = MedicalRecord::with('patient', 'doctor')
        ->where('status', 'Waiting')
        ->whereDate('created_at', now()->toDateString())
        ->get();

    if ($queues->isEmpty()) {
        Log::info('Tidak ada antrian status Waiting hari ini.');
    }

    foreach ($queues as $queue) {
        $message = "🔔 Reminder Antrian\n\n" .
            "🧑 Pasien: {$queue->patient->name}\n" .
            "💉 Dokter: {$queue->doctor->name}\n" .
            "🕑 Waktu Daftar: " . $queue->created_at->format('H:i') . "\n" .
            "📍 Status: {$queue->status}\n" .
            "Mohon bersiap dan datang tepat waktu.";

        Log::info("Mengirim pesan ke Telegram: $message");

        $telegram->sendMessage($message);
    }

    $this->info('Reminder antrian terkirim.');
    Log::info('Scheduler queue:send-reminder selesai');
});

// php artisan queue:send-reminder

