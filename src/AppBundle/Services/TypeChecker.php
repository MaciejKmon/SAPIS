<?php
namespace AppBundle\Services;

final class TypeChecker
{
    public static function isOfType(string $expected, array $toCheck)
    {
        foreach ($toCheck as $key => $value) {
            if (get_class($value) !== $expected) {
                return false;
            }
        }
        return true;
    }
}
