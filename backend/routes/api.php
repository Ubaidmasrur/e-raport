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

// ===============================
// 📌 Autentikasi (Login Umum)
// ===============================

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);

    // 🔓 Akses umum: Tahun ajaran aktif
    Route::get('/tahun-ajaran-aktif', [TahunAjaranController::class, 'aktif']);
});


// ===============================
// 🧑‍💼 ADMIN ROUTES
// ===============================

Route::middleware(['auth:sanctum', 'role:admin'])->prefix('admin')->group(function () {
    // 👥 Manajemen user & siswa
    Route::apiResource('/user', UserController::class);
    Route::apiResource('/siswa', SiswaController::class);

    // 📌 Indikator PPI
    Route::apiResource('/indikator', IndikatorController::class);

    // 📅 Tahun Ajaran
    Route::apiResource('/tahun-ajaran', TahunAjaranController::class);
    Route::post('/tahun-ajaran/{id}/aktif', [TahunAjaranController::class, 'setAktif']);

    // 📄 Riwayat cetak/email laporan
    Route::get('/log-cetak', function () {
        return \App\Models\PrintLog::with(['user', 'siswa'])->latest()->get();
    });
});


// ===============================
// 🧑‍🏫 GURU ROUTES
// ===============================

Route::middleware(['auth:sanctum', 'role:guru'])->prefix('guru')->group(function () {
    // 📝 Input dan lihat nilai
    Route::apiResource('/nilai', NilaiController::class);

    // 📊 Rekap & grafik nilai
    Route::get('/rekap/siswa/{id}', [RekapController::class, 'rekapPerSiswa']);
    Route::get('/rekap/kelas', [RekapController::class, 'rekapKelas']);
    Route::get('/grafik/siswa/{id}', [RekapController::class, 'grafikSiswa']);

    // 🧾 Cetak PDF & Kirim Email
    Route::get('/siswa/{id}/laporan-pdf', [PDFController::class, 'cetakRekap']);
    Route::post('/siswa/{id}/kirim-laporan', [PDFController::class, 'kirimEmailRekap']);
});
