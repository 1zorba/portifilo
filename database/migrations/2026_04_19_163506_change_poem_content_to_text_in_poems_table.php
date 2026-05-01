<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('poems', function (Blueprint $table) {
            // نستخدم change() لتغيير النوع إلى text
            $table->text('poem_content')->change();
        });
    }

    public function down()
    {
        Schema::table('poems', function (Blueprint $table) {
            // للرجوع للحالة الأصلية إذا أردت
            $table->string('poem_content', 255)->change();
        });
    }
};
