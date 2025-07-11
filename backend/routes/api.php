<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthController,
    UserController,
    SiswaController,
    IndikatorController,
    NilaiController,
    TahunAjaranController,
    RekapController,
    PDFController
};

// ==============================
// AUTHENTIKASI UMUM
// ==============================

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);

    // Tahun ajaran aktif (bisa diakses semua)
    Route::get('/tahun-ajaran-aktif', [TahunAjaranController::class, 'aktif']);
});


// ==============================
// ADMIN ROUTES
// ==============================

Route::middleware(['auth:sanctum', 'role:admin'])->prefix('admin')->group(function () {
    // Manajemen user, siswa, indikator
    Route::apiResource('/user', UserController::class);
    Route::apiResource('/siswa', SiswaController::class);
    Route::apiResource('/indikator', IndikatorController::class);

    // Tahun ajaran
    Route::apiResource('/tahun-ajaran', TahunAjaranController::class);
    Route::post('/tahun-ajaran/{id}/aktif', [TahunAjaranController::class, 'setAktif']);

    // Log cetak/email
    Route::get('/log-cetak', function () {
        return \App\Models\PrintLog::with(['user', 'siswa'])->latest()->get();
    });
});


// ==============================
// GURU ROUTES
// ==============================

Route::middleware(['auth:sanctum', 'role:guru'])->prefix('guru')->group(function () {
    // Nilai
    Route::apiResource('/nilai', NilaiController::class);

    // Rekap dan grafik siswa
    Route::get('/rekap/siswa/{id}', [RekapController::class, 'rekapPerSiswa']);
    Route::get('/rekap/kelas', [RekapController::class, 'rekapKelas']);
    Route::get('/grafik/siswa/{id}', [RekapController::class, 'grafikSiswa']);

    // PDF dan Email laporan
    Route::get('/siswa/{id}/laporan-pdf', [PDFController::class, 'cetakRekap']);
    Route::post('/siswa/{id}/kirim-laporan', [PDFController::class, 'kirimEmailRekap']);
});
