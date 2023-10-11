<?php

namespace App\Filters;

use App\Filters\Contracts\QueryFilter;

class StaffFilter extends QueryFilter
{

    public function search($value = null)
    {
        if(!is_null($value)){
            return $this->builder->where('email','like' ,"%$value%" )
                ->orwhere('mobile','like' ,"%$value%");
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

    public function email($value = null)
    {
        if(!is_null($value)){
            return $this->builder->where('email', 'like', "%$value%" );
        }
        return $this->builder;
    }

    public function mobile($value = null)
    {
        if(!is_null($value)){
            return $this->builder->where('mobile','like', "%$value%" );
        }
        return $this->builder;
    }
}
