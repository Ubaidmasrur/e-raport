$table->id();
$table->foreignId('user_id')->constrained()->onDelete('cascade'); // guru/admin
$table->foreignId('siswa_id')->constrained()->onDelete('cascade');
$table->string('tipe'); // 'pdf' atau 'email'
$table->string('semester');
$table->string('tahun_ajaran');
$table->timestamp('waktu')->default(now());
$table->timestamps();
