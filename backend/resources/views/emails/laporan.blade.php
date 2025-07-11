@component('mail::message')
# Laporan Rekap Nilai Siswa

Berikut ini adalah laporan hasil evaluasi pembelajaran untuk:

- **Nama:** {{ $siswa->nama }}
- **Kelas:** {{ $siswa->kelas }}
- **Semester:** {{ $semester }}
- **Tahun Ajaran:** {{ $tahun }}

Silakan buka file lampiran PDF untuk melihat detail nilai dan indikator perkembangan.

@component('mail::button', ['url' => ''])
Terima kasih atas perhatian dan dukungannya.
@endcomponent

Salam hormat,  
**Sistem E-Raport SMA Muhammadiyah 10 Surabaya**
@endcomponent
