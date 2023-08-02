<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHouseDetailCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('house_detail_certificates', function (Blueprint $table) {
            $table->id();
            $table->string('naksa_certificate_no');
            $table->string('name');
            $table->string('ward_no');
            $table->string('municipality');
            $table->string('tole');
            $table->string('road');
            $table->string('land_ward');
            $table->string('land_kitta');
            $table->string('land_area');
            $table->string('land_zone');
            $table->string('land_sub_area');
            $table->string('east_killa');
            $table->string('west_killa');
            $table->string('north_killa');
            $table->string('south_killa');
            $table->string('land_owner_name');
            $table->string('house_owner_name');
            $table->string('house_type');
            $table->string('house_use');
            $table->string('house_road_distance_to_leave');
            $table->string('house_road_distance_left');
            $table->string('house_river_distance_to_leave');
            $table->string('house_river_distance_left');
            $table->string('house_detail');
            $table->string('naksa_pass');
            $table->date('house_completed_date');
            $table->string('remarks');
            $table->string('house_built_area');
            $table->string('house_talla');
            $table->string('total_area');
            $table->string('onsite_inspection');
            $table->string('technical_referal_by');
            $table->string('archiving_proven_by');

            $table->enum('is_printed',[true,false])->default(false);
            $table->integer('print_count')->default(0);
            $table->string('registered_by');
            $table->string('register_signature');
            $table->string('register_name');
            $table->string('register_designation');
            $table->string('registered_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('house_detail_certificates');
    }
}
