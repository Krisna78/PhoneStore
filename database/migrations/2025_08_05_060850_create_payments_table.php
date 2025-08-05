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
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements("id_payment");
            $table->integer("payment_amount");
            $table->date("payment_date");
            $table->bigInteger("status_id");
            $table->bigInteger("method_id");
            $table->foreign("status_id")->references("id_status")->on("payment_statuses")->onDelete("cascade");
            $table->foreign("method_id")->references("id_method")->on("paymentMethod")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
