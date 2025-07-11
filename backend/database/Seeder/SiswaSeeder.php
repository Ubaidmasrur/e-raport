namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Siswa;
use App\Models\User;

class SiswaSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil user wali murid yang sudah dibuat sebelumnya
        $wali = User::where('role', 'wali')->first();

        // Buat siswa dummy
        Siswa::create([
            'nama'    => 'Ahmad Ramadhan',
            'kelas'   => '10-A',
            'user_id' => $wali->id
        ]);

        Siswa::create([
            'nama'    => 'Nadia Putri',
            'kelas'   => '10-B',
            'user_id' => $wali->id
        ]);
    }
}
