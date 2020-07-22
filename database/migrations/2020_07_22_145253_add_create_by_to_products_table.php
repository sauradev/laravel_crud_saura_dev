<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCreateByToProductsTable extends Migration
{
    public function up()
    {
        $user = new \App\User();
        $user->name = 'Otros';
        $user->email = 'otros@otros.com';
        $user->password = '12345678';
        $user->save();

        Schema::table('products', function (Blueprint $table) use ($user) {
            $table->unsignedBigInteger('user_id')->default($user->id);
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
}
