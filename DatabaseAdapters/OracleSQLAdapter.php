<?php

require_once "DatabaseAdapterI.php";

/**
 * IMplementation of DatabaseAdapterI for Oracle database
 *
 * Class OracleSQLAdapter
 */
class OracleSQLAdapter implements DatabaseAdapterI
{

    /**
     * @inheritdoc
     */
    function connect()
    {
        echo "Connected to Oracle database<br>";
    }

    /**
     * @inheritdoc     *
     */
    function disconnect()
    {
        echo "Disconnected from Oracle database<br>";
    }

    /**
     * @inheritdoc
     */
    function select($params)
    {
        // TODO: Implement select() method.
    }
}