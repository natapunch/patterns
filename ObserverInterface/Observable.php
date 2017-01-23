<?php

namespace ObserverInterfaces;

/**
 * Interfaces Observable
 */
interface Observable
{
    /**
     * Add Observer
     *
     * @param Observer $observer
     * @param string $type
     */
    public function addObserver(Observer $observer, string $type);
    /**
     * Fires event for current type
     *
     * @param string $type
     * @return mixed
     */
    public function fireEvent(string $type);

    /**
     * Get Observers return observers array
     *
     * @return mixed
     */
    public function getObservers(): array;
}