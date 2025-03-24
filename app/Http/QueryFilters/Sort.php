<?php

namespace App\Http\QueryFilters;

class Sort extends Filter
{
    protected function applyFilter($queryBuilder)
    {
        return $queryBuilder->orderBy('title', request(self::filterName()));
    }
}
