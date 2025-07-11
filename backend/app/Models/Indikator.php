namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Indikator extends Model
{
    protected $fillable = ['nama', 'domain']; // domain: kognitif, afektif, psikomotorik

    public function nilais()
    {
        return $this->hasMany(Nilai::class);
    }
}
