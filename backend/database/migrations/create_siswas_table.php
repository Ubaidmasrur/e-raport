Schema::create('siswas', function (Blueprint $table) {
    $table->id();
    $table->string('nama');
    $table->string('kelas');
    $table->foreignId('user_id')->constrained()->onDelete('cascade'); // wali murid
    $table->timestamps();
});
