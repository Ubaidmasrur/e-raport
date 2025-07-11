public function run(): void
{
    $this->call([
        UserSeeder::class,
        SiswaSeeder::class,
        IndikatorSeeder::class,
        TahunAjaranSeeder::class,
        NilaiSeeder::class,
    ]);
}
