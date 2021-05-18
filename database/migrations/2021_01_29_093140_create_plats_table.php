<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plats', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('profile_photo_path');
            $table->text('description')->nullable();
            $table->bigInteger('price');
            $table->foreignId('restaurant_id')
                ->constrained()
                ->onDelete('cascade');
            $table->foreignId('categorie_plat_id')
                ->constrained()
                ->onDelete('cascade');
            $table->foreignId('type_cuisine_id')
                ->constrained()
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
        Schema::dropIfExists('plats');
    }
}
