<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vinyls', function (Blueprint $table) {
            $table->id();
            $table->string('album', 150);
            $table->string('artist', 150);
            $table->text('information')->nullable();
            $table->string('label', 50)->nullable();
            $table->string('purchase_price', 50)->nullable();
            $table->string('is_for_sale', 50)->nullable();
            $table->string('advert_id', 50)->nullable();
            $table->string('user_id', 50);
            $table->timestamps();

            $table->foreign('advert_id')->references('advert_id')->on('adverts')->onDelete('set null');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vinyls');
    }
};
