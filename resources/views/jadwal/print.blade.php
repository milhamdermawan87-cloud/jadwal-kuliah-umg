<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Print Jadwal Mata Kuliah</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body { font-family: sans-serif; font-size: 12px; padding: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background: #3b82f6; color: white; }
        .title { text-align: center; font-size: 20px; font-weight: bold; }
        .subtitle { text-align: center; font-size: 13px; color: #666; margin-bottom: 20px; }
        .total { text-align: right; font-weight: bold; margin-top: 15px; }
        .btn-print { display: block; margin: 20px auto; padding: 10px 30px; background: #3b82f6; color: white; border: none; border-radius: 8px; cursor: pointer; font-size: 14px; }
        @media print { .btn-print { display: none; } }
    </style>
</head>
<body>
    <button class="btn-print" onclick="window.print()"><i class="fas fa-print"></i> Print</button>
    <div class="title">Jadwal Mata Kuliah</div>
    <div class="subtitle">Universitas Muhammadiyah Gresik - Program Studi Informatika</div>
    <table>
        <thead>
            <tr>
                <th>Kode</th><th>Mata Kuliah</th><th>Kelas</th><th>SKS</th><th>Hari</th><th>Jam</th><th>Dosen</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jadwals as $j)
            <tr>
                <td>{{ $j->kode_matkul }}</td>
                <td>{{ $j->nama_matkul }}</td>
                <td>{{ $j->kelas }}</td>
                <td>{{ $j->sks }}</td>
                <td>{{ $j->hari }}</td>
                <td>{{ date('H:i', strtotime($j->jam_mulai)) }} - {{ date('H:i', strtotime($j->jam_selesai)) }}</td>
                <td>{{ $j->dosen }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="total">Total SKS: {{ $totalSKS }} / 20 SKS</div>
</body>
</html>
