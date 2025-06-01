<?php

namespace App\Http\QueryFilters;

class Name extends Filter
{
    protected function applyFilter($queryBuilder)
    {
        return $queryBuilder->where($this->filterName(), 'REGEXP' ,request($this->filterName()));
    }
}
