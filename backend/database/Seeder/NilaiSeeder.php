namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\Indikator;

class NilaiSeeder extends Seeder
{
    public function run(): void
    {
        $siswas = Siswa::all();
        $indikators = Indikator::all();

        foreach ($siswas as $siswa) {
            foreach ($indikators as $indikator) {
                Nilai::create([
                    'siswa_id'     => $siswa->id,
                    'indikator_id' => $indikator->id,
                    'semester'     => 'Ganjil',
                    'tahun_ajaran' => '2024/2025',
                    'nilai'        => rand(70, 95),
                    'komentar'     => 'Cukup baik dan terus berkembang'
                ]);
            }
        }
    }
}
