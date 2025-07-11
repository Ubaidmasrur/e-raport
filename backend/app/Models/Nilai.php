namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $fillable = [
        'siswa_id',
        'indikator_id',
        'semester',
        'tahun_ajaran',
        'nilai',
        'komentar'
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function indikator()
    {
        return $this->belongsTo(Indikator::class);
    }
}
