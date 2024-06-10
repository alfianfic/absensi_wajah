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
        // Create the stored procedure
        DB::unprepared('
            DROP PROCEDURE IF EXISTS update_gaji;

            CREATE PROCEDURE update_gaji(IN p_id_user INT, IN p_bulan INT, IN p_tahun INT)
            BEGIN
                DECLARE v_jam_kerja_bulan DOUBLE;
                DECLARE v_total_gaji DOUBLE;

                -- Menghitung total jam kerja per bulan
                SELECT SUM(jam_perhari) INTO v_jam_kerja_bulan
                FROM absensi
                WHERE id_user = p_id_user AND MONTH(tanggal) = p_bulan AND YEAR(tanggal) = p_tahun;

                -- Menghitung total gaji
                SET v_total_gaji = v_jam_kerja_bulan * 10000;

                -- Memeriksa apakah data sudah ada di tabel gaji
                IF EXISTS (SELECT 1 FROM gaji WHERE id_user = p_id_user AND bulan = p_bulan AND tahun = p_tahun) THEN
                    -- Update data di tabel gaji
                    UPDATE gaji
                    SET jam_kerja_bulan = v_jam_kerja_bulan, total_gaji = v_total_gaji
                    WHERE id_user = p_id_user AND bulan = p_bulan AND tahun = p_tahun;
                ELSE
                    -- Insert data baru ke tabel gaji
                    INSERT INTO gaji (id_user, jam_kerja_bulan, bulan, tahun, total_gaji)
                    VALUES (p_id_user, v_jam_kerja_bulan, p_bulan, p_tahun, v_total_gaji);
                END IF;
            END;
        ');

        // Create the trigger
        DB::unprepared('
            CREATE TRIGGER after_absensi_insert
            AFTER INSERT ON absensi
            FOR EACH ROW
            BEGIN
                CALL update_gaji(NEW.id_user, MONTH(NEW.tanggal), YEAR(NEW.tanggal));
            END;
        ');

        // You can also create triggers for updates and deletes if needed
        DB::unprepared('
            CREATE TRIGGER after_absensi_update
            AFTER UPDATE ON absensi
            FOR EACH ROW
            BEGIN
                CALL update_gaji(NEW.id_user, MONTH(NEW.tanggal), YEAR(NEW.tanggal));
            END;
        ');

        DB::unprepared('
            CREATE TRIGGER after_absensi_delete
            AFTER DELETE ON absensi
            FOR EACH ROW
            BEGIN
                CALL update_gaji(OLD.id_user, MONTH(OLD.tanggal), YEAR(OLD.tanggal));
            END;
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Drop the triggers
        DB::unprepared('DROP TRIGGER IF EXISTS after_absensi_insert');
        DB::unprepared('DROP TRIGGER IF EXISTS after_absensi_update');
        DB::unprepared('DROP TRIGGER IF EXISTS after_absensi_delete');

        // Drop the stored procedure
        DB::unprepared('DROP PROCEDURE IF EXISTS update_gaji');
    }
};
