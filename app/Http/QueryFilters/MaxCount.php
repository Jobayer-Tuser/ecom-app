<?php

namespace App\Http\QueryFilters;

class MaxCount extends Filter
{
    protected function applyFilter($queryBuilder)
    {
        return $queryBuilder->take(request(self::filterName()));
    }
}
