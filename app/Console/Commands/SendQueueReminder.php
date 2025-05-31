<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\MedicalRecord;
use App\Services\TelegramService;

class SendQueueReminder extends Command
{
    protected $signature = 'queue:send-reminder';
    protected $description = 'Kirim reminder otomatis untuk antrian pasien';

    protected $telegram;

    public function __construct(TelegramService $telegram)
    {
        parent::__construct();
        $this->telegram = $telegram;
    }

    public function handle()
    {
        $queues = MedicalRecord::with('patient', 'doctor')
            ->where('status', 'Waiting')
            ->whereDate('created_at', now()->toDateString())
            ->get();

        foreach ($queues as $queue) {
            $message = "🔔 Reminder Antrian\n\n" .
                "🧑 Pasien: {$queue->patient->name}\n" .
                "💉 Dokter: {$queue->doctor->name}\n" .
                "🕑 Waktu Daftar: " . $queue->created_at->format('H:i') . "\n" .
                "📍 Status: {$queue->status}\n" .
                "Mohon bersiap dan datang tepat waktu.";

            $this->telegram->sendMessage($message);
        }

        $this->info('Reminder antrian terkirim.');
    }

    protected function schedule(Schedule $schedule)
    {
        $schedule->command('queue:send-reminder')->everyOneMinutes();
    }
}
