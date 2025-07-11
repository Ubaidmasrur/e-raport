public function rekapPerSiswa($id, Request $r)
{
    $nilai = Nilai::with('indikator')->where([
        ['siswa_id', $id],
        ['semester', $r->semester ?? 'Ganjil'],
        ['tahun_ajaran', $r->tahun ?? now()->year . '/' . (now()->year + 1)]
    ])->get();

    return response()->json([
        'siswa' => Siswa::with('user')->findOrFail($id),
        'nilai' => $nilai,
    ]);
}

public function grafikSiswa($id, Request $r)
{
    $nilai = Nilai::with('indikator')->where([
        ['siswa_id', $id],
        ['semester', $r->semester ?? 'Ganjil'],
        ['tahun_ajaran', $r->tahun ?? now()->year . '/' . (now()->year + 1)]
    ])->get();

    return $nilai->map(function ($n) {
        return [
            'indikator' => $n->indikator->nama,
            'domain'    => $n->indikator->domain,
            'nilai'     => $n->nilai
        ];
    });
}
