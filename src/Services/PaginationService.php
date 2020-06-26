<?php
namespace App\Services;

final class PaginationService
{
    const MINIMUM = 1;
    public function paginate(int $all, int $current)
    {
        $next = $current++;
        $previous = $current--;

        if ($previous < self::MINIMUM) {
            $next = null;
        }

        if ($next > $all) {
            $next = null;
        }
    }
}