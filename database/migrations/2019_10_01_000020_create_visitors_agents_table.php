<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use SadekD\LaravelVisitor\Constant;
use SadekD\LaravelVisitor\Utils\TableWithPrefix;

class CreateVisitorsAgentsTable extends TableWithPrefix
{
    public function up()
    {
        Schema::create($this->prefix . '_agents', function (Blueprint $table) {
            $table->bigIncrements(Constant::ID_COLUMN_NAME)->index();
            $table->text(Constant::USER_AGENT_COLUMN_NAME);
            $table->string(Constant::USER_AGENT_HASH_COLUMN_NAME)->unique()->index();

            $table->timestamp(Constant::CREATED_AT_COLUMN_NAME);
        });
    }

    public function down()
    {
        Schema::dropIfExists($this->prefix . '_agents');
    }
}
