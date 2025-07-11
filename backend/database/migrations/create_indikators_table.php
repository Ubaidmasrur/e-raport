Schema::create('indikators', function (Blueprint $table) {
    $table->id();
    $table->string('nama');
    $table->string('domain'); // kognitif, afektif, psikomotorik
    $table->timestamps();
});
