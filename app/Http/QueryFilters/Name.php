<?php

namespace App\Http\QueryFilters;

class Name extends Filter
{
    protected function applyFilter($queryBuilder)
    {
        return $queryBuilder->where(self::filterName(), 'REGEXP' ,request(self::filterName()));
    }
}
