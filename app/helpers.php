<?php


if (!function_exists('isSuperAdmin')) 
{
    function isSuperAdmin()
    {
        $user = auth()->user();
        if ($user) {
            if($user->role == 'superadmin' )
            {
                return $user;
            }
            else {
                return false;
            }
        }
        return false;
    } 
}

if (!function_exists('isAdmin')) 
{
    function isAdmin()
    {
        $user = auth()->user();
        if ($user) {
            if($user->role == 'admin' )
            {
                return $user;
            }
            else {
                return false;
            }
        }
        return false;
    }
}


if (!function_exists('isUser')) 
{
    function isUser()
    {
        $user = auth()->user();
        if ($user) {
            return $user;
        }
        return false;
    }
} 
