<?php

namespace DatabaseAdapters;

/**
 * Database Adapter interface
 *
 * Interface DatabaseAdapterI
 */
interface DatabaseAdapterI
{
    /**
     * Connects to databse
     *
     */
    function connect();

    /**
     * Disconnects from database
     *
     */
    function disconnect();

    /**
     * Gets rows from database
     *
     * @param $params
     * @return mixed
     */
    function select($params);
}