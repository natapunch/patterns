<?php
/**
 *Decorator потомок класса Person
 */

namespace Decorator;

abstract class Decorator extends Person
{
    protected $property=null;

    /**
     * Decorator constructor.
     * @param Person $property
     */
    public function __construct(Person $property){
    $this->property=$property;
    }


    /**
     * @return Person|null
     */
    public function getProperty(){
        return $this->property;
    }


    /**
     * Указатель на потомок класса Person (StudPerson)
     * @return mixed
     */
    public function describe()
    {
        return $this->getProperty()->describe();
    }

}