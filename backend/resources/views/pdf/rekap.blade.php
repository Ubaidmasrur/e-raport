<!DOCTYPE html>
<html>
<head>
    <title>Rekap Nilai</title>
    <style>
        body { font-family: DejaVu Sans; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; font-size: 12px; }
    </style>
</head>
<body>
    <h2>Rekap Nilai Siswa</h2>
    <p><strong>Nama:</strong> {{ $siswa->nama }}</p>
    <p><strong>Kelas:</strong> {{ $siswa->kelas }}</p>
    <p><strong>Semester:</strong> {{ $semester }} | <strong>Tahun Ajaran:</strong> {{ $tahun }}</p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Indikator</th>
                <th>Domain</th>
                <th>Nilai</th>
                <th>Komentar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($nilai as $i => $n)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $n->indikator->nama }}</td>
                    <td>{{ ucfirst($n->indikator->domain) }}</td>
                    <td>{{ $n->nilai }}</td>
                    <td>{{ $n->komentar }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
