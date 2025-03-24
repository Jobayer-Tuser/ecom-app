<?php

namespace App\Http\QueryFilters;

use Closure;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

abstract class Filter
{
    protected abstract function applyFilter($queryBuilder);

    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Builder $builder, Closure $next)
    {
        if ( ! request()->has(self::filterName()) ) {
            return $next($builder);
        }

        return $this->applyFilter(queryBuilder: $next($builder));
    }

    protected function filterName() : string
    {
        return Str::snake(class_basename($this));
    }
}
