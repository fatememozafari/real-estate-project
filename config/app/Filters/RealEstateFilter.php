<?php

namespace App\Filters;

use App\Filters\Contracts\QueryFilter;

class RealEstateFilter extends QueryFilter
{

    public function search($value = null)
    {
        if (!is_null($value)) {
            return $this->builder->where('name', 'like', "%$value%")
                ->orwhere('address', 'like', "%$value%");
        }
        return $this->builder;
    }

    public function name($value = null)
    {
        if (!is_null($value)) {
            return $this->builder->where('name', 'like', "%$value%");
        }
        return $this->builder;
    }

    public function user($value = null)
    {
        if (!is_null($value)) {
            return $this->builder->where('user_id', $value);
        }
        return $this->builder;
    }

    public function status($value = null)
    {
        if (!is_null($value)) {
            return $this->builder->where('status', $value);
        }
        return $this->builder;
    }

}
