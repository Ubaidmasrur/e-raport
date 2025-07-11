$table->id();
$table->string('name');
$table->string('email')->unique();
$table->string('password');
$table->enum('role', ['admin', 'guru', 'wali']);
$table->rememberToken();
$table->timestamps();
