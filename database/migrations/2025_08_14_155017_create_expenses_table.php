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

        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("name", 50)->unique()->nullable(0);
            $table->boolean("deleted")->default(0);
        });

        Schema::create('currencies', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("currency_name")->unique()->nullable(0);
            $table->string("currency_symbol")->unique()->nullable(0);
            $table->boolean("deleted")->default(0);
        });


        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId("user_id");
            $table->foreignId("category_id");
            $table->double("value");
            $table->date("date")->nullable(1)->default(now());
            $table->foreignId("currency_id")->nullable(0);
            $table->boolean("deleted")->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses_categories');
        Schema::dropIfExists('currencies');
        Schema::dropIfExists('expenses');
    }
};
