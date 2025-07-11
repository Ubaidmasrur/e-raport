public function grafikSiswa($id, Request $request)
{
    $semester = $request->semester ?? 'Ganjil';
    $tahun = $request->tahun ?? now()->year . '/' . (now()->year + 1);

    $nilai = Nilai::with('indikator')
        ->where('siswa_id', $id)
        ->where('semester', $semester)
        ->where('tahun_ajaran', $tahun)
        ->get();

    $grafik = $nilai->map(function ($item) {
        return [
            'indikator' => $item->indikator->nama,
            'domain'    => $item->indikator->domain,
            'nilai'     => $item->nilai
        ];
    });

    return response()->json([
        'siswa_id' => $id,
        'semester' => $semester,
        'tahun_ajaran' => $tahun,
        'grafik' => $grafik
    ]);
}
