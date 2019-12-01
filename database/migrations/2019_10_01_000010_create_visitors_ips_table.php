<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use SadekD\LaravelVisitor\Constant;
use SadekD\LaravelVisitor\Utils\TableWithPrefix;

class CreateVisitorsIpsTable extends TableWithPrefix
{
    public function up()
    {
        Schema::create($this->prefix . '_ips', function (Blueprint $table) {
            $table->bigIncrements(Constant::ID_COLUMN_NAME)->index();
            $table->ipAddress(Constant::IP_ADDRESS_COLUMN_NAME)->unique()->index();
            $table->json(Constant::GEOIP_COLUMN_NAME)->nullable();

            $table->timestamp(Constant::CREATED_AT_COLUMN_NAME);
        });
    }

    public function down()
    {
        Schema::dropIfExists($this->prefix . '_ips');
    }
}
