<?php

namespace ObserverInterfaces;
/**
 * interface Observer
 * */
interface Observer
{
    /**
     * @param Observable $source
     * @param string $type
     */
    public function notify(Observable $source, string $type);
}