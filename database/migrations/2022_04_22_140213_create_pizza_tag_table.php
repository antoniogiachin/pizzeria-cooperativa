<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePizzaTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pizza_tag', function (Blueprint $table) {

            $table->unsignedBigInteger("pizza_id");
            $table->foreign("pizza_id")->references("id")->on("pizzas")->onDelete("cascade");

            $table->unsignedBigInteger("tag_id");
            $table->foreign("tag_id")->references("id")->on("tags")->onDelete("cascade");

            $table->index("pizza_id", "tag_id");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pizza_tag');
    }
}
