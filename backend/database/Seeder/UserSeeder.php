User::create([
    'name' => 'Admin',
    'email' => 'admin@eraport.com',
    'password' => bcrypt('password'),
    'role' => 'admin',
]);

User::create([
    'name' => 'Guru BK',
    'email' => 'guru@eraport.com',
    'password' => bcrypt('password'),
    'role' => 'guru',
]);

User::create([
    'name' => 'Wali Murid 1',
    'email' => 'wali@eraport.com',
    'password' => bcrypt('password'),
    'role' => 'wali',
]);
