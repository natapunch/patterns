<?php
/**
 *CitizenDecorator потомок класса Decorator
 */
namespace Decorator;

class CitizenDecorator extends Decorator
{
    public function describe()
    {
        parent::describe();
        print "<br>Гражданин Франции ";
    }
}