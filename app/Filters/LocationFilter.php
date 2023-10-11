<?php

namespace App\Filters;

use App\Filters\Contracts\QueryFilter;

class LocationFilter extends QueryFilter
{

    public function search($value = null)
    {
        if(!is_null($value)){
            return $this->builder->where('title','like' ,"%$value%" );
        }
        return $this->builder;
    }

    public function title($value = null)
    {
        if (!is_null($value)) {
            return $this->builder->where('title', 'like', "%$value%");
        }
        return $this->builder;
    }

    public function contract($value = null)
    {
        if (!is_null($value)) {
            return $this->builder->where('contract', $value);
        }
        return $this->builder;
    }

    public function type($value = null)
    {
        if (!is_null($value)) {
            return $this->builder->where('type', $value);
        }
        return $this->builder;
    }

}
