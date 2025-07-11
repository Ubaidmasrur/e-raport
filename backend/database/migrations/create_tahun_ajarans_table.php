$table->id();
$table->string('tahun'); // contoh: 2024/2025
$table->boolean('is_active')->default(false);
$table->timestamps();
