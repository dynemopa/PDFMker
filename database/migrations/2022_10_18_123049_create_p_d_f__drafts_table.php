<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePDFDraftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_d_f__drafts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('title');
            $table->string('titlepageimage');
            $table->string('summarycontent');
            $table->string('totelrain');
            $table->string('totelmud');
            $table->string('progressphoto');
            $table->string('progressphototwo');
            $table->string('progressphotothree');
            $table->string('twoweekcontent');
            $table->string('safetytopic');
            $table->string('safetyimage');
            $table->string('pembroofing');
            $table->string('frameexteriorwalls');
            $table->string('sheathwalls');
            $table->string('sidinginstall');
            $table->string('windows');
            $table->string('exteriordoorinstal');
            $table->string('lightingfixtures');
            $table->string('paving');
            $table->string('backfillbehindcurbs');
            $table->string('Pavers');
            $table->string('tasks_issue');
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
        Schema::dropIfExists('p_d_f__drafts');
    }
}
