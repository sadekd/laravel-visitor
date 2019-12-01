<?php
declare(strict_types=1);

namespace SadekD\LaravelVisitor\Utils;

use Illuminate\Database\Migrations\Migration;

abstract class TableWithPrefix extends Migration
{
    protected $prefix;

    public function __construct()
    {
        $this->prefix = config('laravel-visitor.tables_prefix');
    }
}
