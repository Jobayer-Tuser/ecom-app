<?php

namespace App\Http\QueryFilters;

class Status extends Filter
{
    protected function applyFilter($queryBuilder)
    {
        return $queryBuilder->where($this->filterName(), request($this->filterName()));
    }
}
