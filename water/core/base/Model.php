<?php declare(strict_types=1);

namespace core\base;

use core\database\Crud;

class Model extends Crud
{
    public function __construct(string $table, string $column = 'id')
    {
        parent::setTable($table);
        parent::setPrimaryKey($column);
    }
}
