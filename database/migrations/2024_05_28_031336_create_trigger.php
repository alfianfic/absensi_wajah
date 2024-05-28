<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER hitung_jam_perhari
            BEFORE INSERT ON absensi
            FOR EACH ROW
            BEGIN
                DECLARE jam INT;
                DECLARE menit INT;
                DECLARE detik INT;

                SET jam = HOUR(TIMEDIFF(NEW.jam_pulang, NEW.jam_kedatangan));
                SET menit = MINUTE(TIMEDIFF(NEW.jam_pulang, NEW.jam_kedatangan));
                SET detik = SECOND(TIMEDIFF(NEW.jam_pulang, NEW.jam_kedatangan));

                SET NEW.jam_perhari = jam + (menit / 60) + (detik / 3600);
            END
        ');

        // Membuat trigger untuk menghitung jam kerja sebelum update
        DB::unprepared('
            CREATE TRIGGER update_jam_perhari
            BEFORE UPDATE ON absensi
            FOR EACH ROW
            BEGIN
                DECLARE jam INT;
                DECLARE menit INT;
                DECLARE detik INT;

                SET jam = HOUR(TIMEDIFF(NEW.jam_pulang, NEW.jam_kedatangan));
                SET menit = MINUTE(TIMEDIFF(NEW.jam_pulang, NEW.jam_kedatangan));
                SET detik = SECOND(TIMEDIFF(NEW.jam_pulang, NEW.jam_kedatangan));

                SET NEW.jam_perhari = jam + (menit / 60) + (detik / 3600);
            END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS hitung_jam_perhari');
        DB::unprepared('DROP TRIGGER IF EXISTS update_jam_perhari');
    }
};
