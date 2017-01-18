<?php

use DatabaseAdapters\DatabaseAdapters;
use DatabaseAdapters\DatabaseAdapterI;
use Exceptions\IncorrectAdapterNameException;
use DatabaseAdapters\PostgreSQLAdapter;
use DatabaseAdapters\OracleSQLAdapter;

/**
 * Factory for database adapters
 *
 * Class DatabaseAdapterFactory
 */
class DatabaseAdapterFactory
{
    /**
     * Returns database adapter by its name
     *
     * @param $name string name of adapter
     * @return DatabaseAdapterI
     * @throws IncorrectAdapterNameException if name is incorrect
     */
    public function getAdapter(string $name): DatabaseAdapterI
    {
        $result = null;
        switch ($name) {
            case DatabaseAdapters::POSTRESQL_ADAPTER:
                require_once "DatabaseAdapters/PostgreSQLAdapter.php";
                $result = new PostgreSQLAdapter();
                break;
            case DatabaseAdapters::ORACLE_ADAPTER:
                require_once "DatabaseAdapters/OracleSQLAdapter.php";
                $result = new OracleSQLAdapter();
                break;
            default:
                throw new IncorrectAdapterNameException("Name " . $name . " is incorrect!");
        }

        return $result;
    }
}