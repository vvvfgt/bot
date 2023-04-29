<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
           $table->dropColumn('product');
           $table->integer('total')
               ->after('email');
           $table->tinyInteger('paid')
               ->default(0)
               ->after('total');
           $table->jsonb('products')
               ->after('name');
        });
    }

    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('paid');
            $table->dropColumn('total');
            $table->string('product')
                ->after('email');
        });
    }
};
