Schema::create('nilais', function (Blueprint $table) {
    $table->id();
    $table->foreignId('siswa_id')->constrained()->onDelete('cascade');
    $table->foreignId('indikator_id')->constrained()->onDelete('cascade');
    $table->string('semester');
    $table->string('tahun_ajaran');
    $table->integer('nilai');
    $table->text('komentar')->nullable();
    $table->timestamps();
});
