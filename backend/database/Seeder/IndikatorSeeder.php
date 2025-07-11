namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Indikator;

class IndikatorSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['nama' => 'Mengerjakan tugas tepat waktu', 'domain' => 'kognitif'],
            ['nama' => 'Berani mengemukakan pendapat', 'domain' => 'afektif'],
            ['nama' => 'Kemandirian dalam aktivitas fisik', 'domain' => 'psikomotorik'],
        ];

        foreach ($data as $indikator) {
            Indikator::create($indikator);
        }
    }
}
