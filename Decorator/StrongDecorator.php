<?php
/**
 *Новый потомок класса Декоратор
 */

namespace Decorator;

class StrongDecorator extends Decorator
{
    /**
     * Добавили текст жирным шрифтом
     *
     */
    public function describe()
    {
        parent::describe();
        print "<b>Добавили гражданство</b>";
    }
}