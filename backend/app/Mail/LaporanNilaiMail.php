namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LaporanNilaiMail extends Mailable
{
    use Queueable, SerializesModels;

    public $siswa;
    public $semester;
    public $tahun;
    public $pdfPath;

    /**
     * Buat instance mail laporan.
     */
    public function __construct($siswa, $semester, $tahun, $pdfPath)
    {
        $this->siswa = $siswa;
        $this->semester = $semester;
        $this->tahun = $tahun;
        $this->pdfPath = $pdfPath;
    }

    /**
     * Bangun email dengan lampiran PDF.
     */
    public function build()
    {
        return $this->subject('Laporan Rekap Nilai Siswa')
            ->markdown('emails.laporan')
            ->attach($this->pdfPath, [
                'as' => "Rekap-Nilai-{$this->siswa->nama}-{$this->semester}-{$this->tahun}.pdf",
                'mime' => 'application/pdf',
            ]);
    }
}
