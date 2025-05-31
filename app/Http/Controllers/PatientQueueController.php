<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\MedicalRecord;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Services\TelegramService;

class PatientQueueController extends Controller
{
    protected $telegram;

    public function __construct(TelegramService $telegram)
    {
        $this->telegram = $telegram;
    }

    public function index()
    {
        $queue_data = MedicalRecord::with('patient', 'doctor')->get();
        return view('admin.backend.patient-queue.index', compact('queue_data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'service' => 'required|string',
            'complaint' => 'nullable|string',
            'status' => 'nullable|string',
        ]);

        MedicalRecord::create($request->all());
        // $queue = MedicalRecord::create($request->all());

        // // Cek status sebelum kirim notif
        // if ($queue->status == 'Waiting' || $queue->status == 'In Progress') {
        //     $message = "📢 <b>Reminder Antrian Baru</b>\n\n" .
        //         "🧑 Pasien: <b>" . $queue->patient->name . "</b>\n" .
        //         "💉 Dokter: <b>" . $queue->doctor->name . "</b>\n" .
        //         "🕑 Jam Daftar: <b>" . $queue->created_at->format('H:i') . "</b>\n" .
        //         "📝 Keluhan: " . ($queue->complaint ?? '-');

        //     $this->telegram->sendMessage($message);
        // }

        return redirect()->route('patient-queue.index')->with('success', 'Data antrian berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $queue_data = MedicalRecord::with('patient', 'doctor')->findOrFail($id);
        $patients = Patient::all();
        $doctors = Doctor::all();
        $services = ['BPJS', 'Jamkesda', 'KIS', 'Jampersal', 'Prudential', 'AXA Mandiri', 'Allianz', 'Manulife', 'AIA', 'Sinarmas MSIG', 'Sequis Life', 'Jasa Raharja', 'BRI Life', 'Puskesmas', 'RSUD'];

        return view('admin.backend.patient-queue.edit', compact('queue_data', 'patients', 'doctors', 'services'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'service' => 'required|string',
            'complaint' => 'nullable|string',
            'status' => 'nullable|string',
        ]);

        // Cari data berdasarkan ID
        $queue = MedicalRecord::findOrFail($id);

        // Update data
        $queue->update([
            'patient_id' => $request->patient_id,
            'doctor_id' => $request->doctor_id,
            'service' => $request->service,
            'complaint' => $request->complaint,
            'status' => $request->status,
        ]);

        // Kirim notifikasi ke Telegram kalau status sesuai yang diinginkan
        if (in_array($queue->status, ['In Progress'])) {
            // $message = "📢 <b>Pengingat Antrian</b>\n\n" .
            //     "Yth. <b>{$queue->patient->name}</b>, harap bersiap menuju ruang praktek dokter <b>{$queue->doctor->name}</b>.\n" .
            //     "Terima kasih.";
            $message = "🔔 <b>Reminder Antrian Pasien</b>\n\n" .
                "🧑 Pasien: <b>{$queue->patient->name}</b>\n" .
                "💉 Dokter: <b>{$queue->doctor->name}</b>\n" .
                "📅 Tanggal: <b>" . $queue->created_at->format('d M Y') . "</b>\n" .
                "⏰ Waktu: <b>" . $queue->created_at->format('H:i') . " WIB</b>\n" .
                "🔢 Nomor Antrian: <b>{$queue->queue_number}</b>\n" .
                "📍 Lokasi: <b>Ruang Poli Umum, Lantai 1</b>\n" .
                "📝 Keluhan: {$queue->complaint}\n\n" .
                "📞 Jika ada pertanyaan, hubungi 0812-3456-7890\n" .
                "🙏 Mohon konfirmasi kehadiran dengan membalas pesan ini.\n" .
                "Terima kasih!";


            $this->telegram->sendMessage($message);
        }

        return redirect()->route('patient-queue.index')->with('message', 'Data berhasil diperbarui!');
    }


    public function destroy($id)
    {
        $queue = MedicalRecord::findOrFail($id);
        $queue->delete();

        return redirect()->route('patient-queue.index')->with('success', 'Data antrian berhasil dihapus!');
    }
}
