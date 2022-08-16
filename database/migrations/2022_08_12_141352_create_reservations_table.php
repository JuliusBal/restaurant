<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('restaurant_id');
            $table->string('guest_first_name');
            $table->string('guest_last_name');
            $table->string('guest_email');
            $table->string('guest_phone_number');
            $table->json('guests')->nullable();
            $table->integer('total_guests')->nullable();
            $table->integer('reserved_tables')->nullable();
            $table->dateTime('reservation_date');
            $table->integer('reserved_for');
            $table->boolean('reserved')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('restaurants');
    }
};
