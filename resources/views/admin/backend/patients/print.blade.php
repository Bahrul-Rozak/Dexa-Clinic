<!DOCTYPE html>
<html>
<head>
    <title>Medical Records - {{ $patient->name }}</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 14px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid black; padding: 8px; }
        th { background-color: #f2f2f2; }
        .no-print { margin-top: 20px; }
    </style>
</head>
<body>
    <h2>Medical Records for {{ $patient->name }}</h2>
    <p><strong>Patient Code:</strong> {{ $patient->patient_code }}</p>
    <p><strong>Address:</strong> {{ $patient->address }}</p>

    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Complaint</th>
                <th>Service</th>
                <th>Diagnosis</th>
                <th>Notes</th>
                <th>Blood Type</th>
                <th>Height</th>
                <th>Waist</th>
                <th>Weight</th>
                <th>Treatment</th>
            </tr>
        </thead>
        <tbody>
            @foreach($medicalRecords as $record)
            <tr>
                <td>{{ $record->created_at->format('Y-m-d') }}</td>
                <td>{{ $record->complaint }}</td>
                <td>{{ $record->service }}</td>
                <td>{{ $record->diagnosis }}</td>
                <td>{{ $record->notes }}</td>
                <td>{{ $record->blood_type }}</td>
                <td>{{ $record->height }} cm</td>
                <td>{{ $record->waist }} cm</td>
                <td>{{ $record->weight }} kg</td>
                <td>{{ $record->treatment }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="no-print">
        <button onclick="window.print()">🖨️ Print</button>
        <a href="{{ route('patients.edit', $patient->id) }}">⬅️ Back</a>
    </div>
</body>
</html>
