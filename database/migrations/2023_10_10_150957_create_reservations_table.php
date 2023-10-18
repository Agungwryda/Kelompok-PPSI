<?php


use App\Models\User;
use App\Models\Capster;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Capster::class);
            $table->foreignIdFor(User::class);
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('costumer_name');
            $table->string('phone');
            $table->string('email');
            $table->enum('status', ['Pending', 'Waiting For Payment', 'Confirmed', 'Cancelled'])->default('Pending');
            $table->string('confirm_payment')->nullable();
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
        Schema::dropIfExists('reservations');
    }
};
