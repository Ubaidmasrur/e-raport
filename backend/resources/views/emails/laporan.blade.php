@component('mail::message')
# Laporan Rekap Nilai Siswa

Berikut adalah laporan nilai untuk:

- **Nama:** {{ $siswa->nama }}  
- **Kelas:** {{ $siswa->kelas }}  
- **Semester:** {{ $semester }}  
- **Tahun Ajaran:** {{ $tahun }}

@component('mail::button', ['url' => ''])
Terima kasih telah mempercayakan pendidikan anak Anda.
@endcomponent

Salam hormat,  
Sistem E-Raport SMA Muhammadiyah 10 Surabaya
@endcomponent
