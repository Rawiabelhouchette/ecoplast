<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProduitIdToRequestsTable extends Migration
{
    public function up()
    {
        Schema::table('requests', function (Blueprint $table) {
            // Add the foreign key column
            $table->unsignedBigInteger('produit_id')->nullable(); // This will reference the 'products' table

            // Add foreign key constraint
            $table->foreign('produit_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('requests', function (Blueprint $table) {
            // Remove the foreign key and the column
            $table->dropForeign(['produit_id']);
            $table->dropColumn('produit_id');
        });
    }
}
