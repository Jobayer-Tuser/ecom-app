<?php

namespace App\Http\QueryFilters;

class Status extends Filter
{
    protected function applyFilter($queryBuilder)
    {
        return $queryBuilder->where(self::filterName(), request(self::filterName()));
    }
}
