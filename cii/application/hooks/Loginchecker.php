<?php

class Loginchecker
{
    private $CI;
 
    function __construct()
    {
        $this->CI = &get_instance();
    }
 
    function loginCheck()
    {
        echo "login checker";
    }
    
}

?>