<h3 style="text-align: center; font-size: 1.5em; margin-bottom: 20px; color: #333;">
    Laporan Data Santri
</h3>

<table border="1" cellspacing="0" cellpadding="10" style="width: 100%; border-collapse: collapse; font-family: Arial, sans-serif; font-size: 0.9em;">
    <thead style="background-color: #e0e0e0;">
        <tr>
            <th style="border: 1px solid #000; padding: 8px; text-align: left;">No</th>
            <th style="border: 1px solid #000; padding: 8px; text-align: left;">Nama Santri</th>
            <th style="border: 1px solid #000; padding: 8px; text-align: left;">Tempat Lahir</th>
            <th style="border: 1px solid #000; padding: 8px; text-align: left;">Tanggal Lahir</th>
            <th style="border: 1px solid #000; padding: 8px; text-align: left;">Alamat</th>
            <th style="border: 1px solid #000; padding: 8px; text-align: left;">Nomor Handphone</th>
        </tr>
    </thead>
    <tbody>
        @foreach($santris as $s)
        <tr style="background-color: #f9f9f9;">
            <td style="border: 1px solid #000; padding: 8px;">{{ $loop->iteration }}</td>
            <td style="border: 1px solid #000; padding: 8px;">{{ $s->nama_santri }}</td>
            <td style="border: 1px solid #000; padding: 8px;">{{ $s->tempat_lahir }}</td>
            <td style="border: 1px solid #000; padding: 8px;">{{ $s->tanggal_lahir }}</td>
            <td style="border: 1px solid #000; padding: 8px;">{{ $s->alamat }}</td>
            <td style="border: 1px solid #000; padding: 8px;">{{ $s->no_hp }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
