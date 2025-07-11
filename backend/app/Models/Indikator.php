class Indikator extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'domain'];

    public function nilais()
    {
        return $this->hasMany(Nilai::class);
    }
}
