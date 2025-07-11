use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrintLogsTable extends Migration
{
    public function up()
    {
        Schema::create('print_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');   // guru/admin
            $table->foreignId('siswa_id')->constrained()->onDelete('cascade');  // siswa yang dicetak
            $table->string('tipe'); // 'pdf' atau 'email'
            $table->string('semester');
            $table->string('tahun_ajaran');
            $table->timestamp('waktu')->default(now());
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('print_logs');
    }
}
