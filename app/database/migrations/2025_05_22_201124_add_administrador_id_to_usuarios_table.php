<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('usuarios', function (Blueprint $table) {
        $table->unsignedBigInteger('administrador_id')->nullable()->after('id');

        $table->foreign('administrador_id')->references('id')->on('usuarios')->onDelete('set null');
    });
}

    public function down()
    {
        Schema::table('usuarios', function (Blueprint $table) {
            $table->dropForeign(['administrador_id']);
            $table->dropColumn('administrador_id');
        });
    }
};
