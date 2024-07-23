<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait Filterable
{
    public function scopeFilter(Builder $builder, string|null $filter = null) : Builder
    {
        $filterName = request('name');
        $filterToApply = array_intersect($this->filterable, array_keys($filterName));

        foreach($filterToApply as $key => $filter){
            $value = explode(',', $filterToApply[$filter]);
            $builder->whereIn($filter, $value);
        }
        return $builder;
    }
}
