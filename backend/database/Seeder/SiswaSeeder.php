$wali = User::where('role', 'wali')->first();

Siswa::create([
    'nama' => 'Ahmad Ramadhan',
    'kelas' => '10-A',
    'user_id' => $wali->id,
]);
