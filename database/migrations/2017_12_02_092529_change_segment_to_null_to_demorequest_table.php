<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeSegmentToNullToDemorequestTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('demo_request', function (Blueprint $table) {
            $table->string('segment')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('demo_request', function (Blueprint $table) {
            $table->string('segment')->nullable('false')->change();
        });
    }

}
