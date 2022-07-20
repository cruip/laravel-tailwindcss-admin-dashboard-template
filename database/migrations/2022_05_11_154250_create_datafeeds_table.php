<?php

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
            Schema::create('datafeeds', function (Blueprint $table) {
                $table->id();
                $table->string('label')->nullable();
                $table->float('data', 10, 2)->nullable();
                $table->tinyInteger('dataset_name')->nullable();
                $table->tinyInteger('data_type')->default(1);
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
            Schema::dropIfExists('datafeeds');
        }
    };
