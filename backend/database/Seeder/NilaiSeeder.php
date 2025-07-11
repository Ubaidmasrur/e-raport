foreach (Siswa::all() as $siswa) {
    foreach (Indikator::all() as $indikator) {
        Nilai::create([
            'siswa_id' => $siswa->id,
            'indikator_id' => $indikator->id,
            'semester' => 'Ganjil',
            'tahun_ajaran' => '2024/2025',
            'nilai' => rand(75, 95),
            'komentar' => 'Baik dan terus meningkat',
        ]);
    }
}
