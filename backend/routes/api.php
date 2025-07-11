Route::middleware(['auth:sanctum'])->get('/grafik/siswa/{id}', [RekapController::class, 'grafikSiswa']);
