<?php



if(!function_exists('set_active_menu')){

    function set_active_menu($routeName){
        if (\Illuminate\Support\Facades\Route::currentRouteName() == $routeName)
        return 'active';
    }

}

