<?php

namespace App\Filters\Contracts;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

abstract class QueryFilter
{
    private  $request;
    protected  $builder;
    public function __construct()
    {
        $this->request = Request::capture();
    }

    public function apply(Builder $builder)
    {
        $this->builder = $builder;
        foreach ($this->filters() as $key => $value){
            if(!method_exists($this, $key)){
                continue;
            }
            (!is_null($value)) ? $this->{$key}($value) : $this->{$key}();
        }

    }

    public function filters()
    {
//        if(is_array(request()->all()) && count(request()->all()) > 0){
//            $k = array_keys(request()->all());
//            if(count($k) > 0) {
//                $r = explode('|', $k[0]);
//                $filters = [];
//                foreach ($r as $value){
//
//                    $valueParams = explode(':', $value);
//
//                    $filters[$valueParams[0]] = $valueParams[1];
//                }
//            }
//        }

        return request()->all();
    }
}
