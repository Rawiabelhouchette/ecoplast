<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRoleIdToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Add the role_id column
            $table->unsignedBigInteger('role_id')->nullable()->after('id');

            // Add a foreign key constraint
            $table->foreign('role_id')
                ->references('id')->on('roles')
                ->onDelete('set null'); // Set role_id to null if the related role is deleted
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Drop the foreign key constraint
            $table->dropForeign(['role_id']);

            // Drop the role_id column
            $table->dropColumn('role_id');
        });
    }
}

