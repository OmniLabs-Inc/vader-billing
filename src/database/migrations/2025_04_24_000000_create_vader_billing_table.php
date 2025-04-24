<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('vader_billing', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number');
            $table->decimal('amount', 10, 2);
            $table->string('description');
            $table->date('due_date');
            $table->enum('status', ['pending', 'due', 'overdue', 'paid']);
            $table->unsignedBigInteger('omniID')->nullable();
            $table->string('currency')->default('ZAR');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vader_billing');
    }
};
