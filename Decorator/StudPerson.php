<?php
/**
 *Потомок класса Person
 */

namespace Decorator;

class StudPerson extends Person
{
    public function describe()
    {
        print "Oсновные данные \n";
    }
}

