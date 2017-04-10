<?php
namespace src\Services;

class TypeChecker
{
    public static function isOfType( $expected, array $toCheck)
    {
        $isThisType = true;
        if(!is_object($expected)) {
            return new \InvalidArgumentException();
        }
        array_walk($toCheck, function ($value) use (&$isThisType, $expected)
        {
            if (!$value instanceof $expected) {
                $isThisType = false;
            }
        });

        return $isThisType;
    }
}
