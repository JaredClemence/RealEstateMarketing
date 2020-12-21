<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PropertyChange extends Migration {

    /**
     * Remove column for embed code of virtual tour.
     *
     * @return void
     */
    public function up() {
        Schema::table('properties', function (Blueprint $table) {
            $table->dropColumn('virtual_embed');
            $table->string('referral_agent_name')->default('Jared');
            $table->string('referral_agent_email')->default('jaredclemence@gmail.com');
        });
    }

    /**
     * Add column for embed code of virtual tour.
     *
     * @return void
     */
    public function down() {
        Schema::table('properties', function (Blueprint $table) {
            $table->text('virtual_embed');
            $table->dropColumn('referral_agent_name');
            $table->dropColumn('referral_agent_email');
        });
    }

}
