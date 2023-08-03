<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('deleted_by')->nullable();;
            $table->unsignedBigInteger('updated_by')->nullable();;
            $table->unsignedBigInteger('created_by')->nullable();;
            $table->string('nombre', 2000);
            $table->string('categoria', 2000);
            $table->decimal('precio');
            $table->integer('cantidad');
            $table->string('slug', 2000)->nullable();
            $table->string('imagen', 2000)->nullable()->mimes('jpg', 'jpeg', 'png');
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
            $table->foreign('deleted_by')->references('id')->on('users');
            $table->softDeletes();
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
        //
    }
};
