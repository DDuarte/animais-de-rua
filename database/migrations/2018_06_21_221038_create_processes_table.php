<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('processes', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name', 127);
            $table->string('contact', 127)->nullable();
            $table->string('phone')->nullable();
            $table->string('email', 127)->nullable();
            $table->string('address', 127)->nullable();
            $table->string('territory_id', 6)->nullable();
            $table->integer('headquarter_id')->unsigned()->nullable();
            $table->enum('specie', ['dog', 'cat']);
            $table->integer('amount_males')->unsigned()->default(0);
            $table->integer('amount_females')->unsigned()->default(0);
            $table->integer('amount_other')->unsigned()->default(0);
            $table->enum('status', ['approving', 'waiting_godfather', 'waiting_capture', 'open', 'closed', 'archived'])->default('approving');
            $table->text('history')->nullable();
            $table->text('notes')->nullable();
            $table->text('latlong')->nullable();
            $table->text('images')->nullable();

            $table->index(['headquarter_id']);
            $table->foreign('headquarter_id')
                ->references('id')
                ->on('headquarters')
                ->onDelete('cascade');

            $table->index(['territory_id']);
            $table->foreign('territory_id')
                ->references('id')
                ->on('territories')
                ->onDelete('cascade');

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
        Schema::dropIfExists('processes');
    }
}