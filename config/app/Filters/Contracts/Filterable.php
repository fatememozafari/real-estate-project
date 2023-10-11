<?php

namespace App\Filters\Contracts;

trait Filterable
{
    public function scopeFilter($query, QueryFilter $queryFilter)
    {
        return $queryFilter->apply($query);
    }
}
