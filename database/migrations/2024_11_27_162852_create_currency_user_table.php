<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrencyUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currency_user', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            $table->string('currency_code', 3);
            $table->foreign('currency_code')
                ->references('code')->on('currencies')
                ->onDelete('cascade');

            // composite key
            $table->primary(['user_id', 'currency_code']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('currency_user');
    }
}
