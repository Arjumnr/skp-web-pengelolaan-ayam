<?php 
    function set_active($path ,$active = 'active'){
        return call_user_func_array('Request::is', (array)$path) ? $active : '';
    }

    function set_active_toggle($path, $active = 'active pcoded-trigger'){
        return call_user_func_array('Request::is', (array)$path) ? $active : '';
    }
?>