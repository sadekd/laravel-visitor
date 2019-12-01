<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use SadekD\LaravelVisitor\Constant;
use SadekD\LaravelVisitor\Utils\TableWithPrefix;

class CreateVisitorsLocalesTable extends TableWithPrefix
{
    public function up()
    {
        Schema::create($this->prefix . '_locales', function (Blueprint $table) {
            $table->bigIncrements(Constant::ID_COLUMN_NAME)->index();
            $table->string(Constant::VISITOR_LOCALE_COLUMN_NAME)->unique()->index();

            $table->timestamp(Constant::CREATED_AT_COLUMN_NAME);
        });
    }

    public function down()
    {
        Schema::dropIfExists($this->prefix . '_locales');
    }
}
