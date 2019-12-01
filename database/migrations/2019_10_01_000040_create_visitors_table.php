<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use SadekD\LaravelVisitor\Constant;
use SadekD\LaravelVisitor\Utils\TableWithPrefix;

class CreateVisitorsTable extends TableWithPrefix
{
    public function up()
    {
        Schema::create($this->prefix, function (Blueprint $table) {
            $table->bigIncrements(Constant::ID_COLUMN_NAME)->index();

            $table->unsignedBigInteger(Constant::VISITOR_IP_ID_COLUMN_NAME)->nullable();
            $table->unsignedBigInteger(Constant::VISITOR_AGENT_ID_COLUMN_NAME)->nullable();
            $table->unsignedBigInteger(Constant::VISITOR_LOCALE_ID_COLUMN_NAME)->nullable();
            $table->unsignedBigInteger(Constant::COOKIE_VISITOR_ID_COLUMN_NAME)->nullable();

            $table->timestamps();

            $table->foreign(Constant::VISITOR_IP_ID_COLUMN_NAME)
                ->references(Constant::ID_COLUMN_NAME)
                ->on($this->prefix . '_ips')
                ->onDelete('set null');

            $table->foreign(Constant::VISITOR_AGENT_ID_COLUMN_NAME)
                ->references(Constant::ID_COLUMN_NAME)
                ->on($this->prefix . '_agents')
                ->onDelete('set null');

            $table->foreign(Constant::VISITOR_LOCALE_ID_COLUMN_NAME)
                ->references(Constant::ID_COLUMN_NAME)
                ->on($this->prefix . '_locales')
                ->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists($this->prefix);
    }
}
