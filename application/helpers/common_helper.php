<?php

/**
 * @author Atang Sutisna <atang.sutisna.87@gmail.com>
 */
defined('BASEPATH') OR exit('No direct script access allowed');

if (! function_exists('show_bootstrap_warn_alert')) 
{
    /**
     * @param string $warn_message
     */
    function show_bootstrap_warn_alert($warn_message)
    {
        echo "<div class=\"alert alert-warning\" role=\"alert\">{$warn_message}</div>";
    }    
}

if (! function_exists('show_bootstrap_info_alert')) 
{
    /**
     * @param string $info_message
     */
    function show_bootstrap_info_alert($info_message)
    {
        echo "<div class=\"alert alert-info\" role=\"alert\">{$info_message}</div>";
    }    
}

if (! function_exists('show_bootstrap_danger_alert')) 
{
    /**
     * @param string $danger_message
     */
    function show_bootstrap_danger_alert($danger_message)
    {
        echo "<div class=\"alert alert-danger\" role=\"alert\">{$danger_message}</div>";
    }
    
}

if (! function_exists('show_boostrap_alert')) 
{
    function show_bootstrap_alert()
    {
        $CI = & get_instance();
        
        $warn_message = $CI->session->flashdata('warn');
        if (isset($warn_message)) {
            show_bootstrap_warn_alert($warn_message);
        }
        
        $info_message = $CI->session->flashdata('info');
        if (isset($info_message)) {
            show_bootstrap_info_alert($info_message);
        }
        
        $danger_message = $CI->session->flashdata('danger');
        if (isset($danger_message)) {
            show_bootstrap_danger_alert($danger_message);
        }
        
    }
    
}


if (! function_exists('format_date')) 
{
    /**
     * @param string $danger_message
     */
    function format_date($date)
    {
        return date("d/m/Y", strtotime($date));
    }
    
}

if (! function_exists('currency_format')) 
{
    function currency_format($number, $currency = 'Rp.')
    {
	   return $currency . number_format($number,2,',','.');       
    }
}

if (! function_exists('get_logged_fullname')) 
{
    /**
     * @param string $danger_message
     */
    function get_logged_fullname()
    {
        $CI = & get_instance();
        return $CI->session->userdata('name');
    }
    
}

if (! function_exists('get_logged_role_name')) 
{
    /**
     * @param string $danger_message
     */
    function get_logged_role_name()
    {
        $CI = & get_instance();
        return $CI->session->userdata('level');
    }
    
}

if (! function_exists('is_user')) 
{
    function is_user()
    {
        $CI = & get_instance();
        return $CI->session->userdata('level') == 'user';
    }
    
}

if (! function_exists('is_admin')) 
{
    function is_admin()
    {
        $CI = & get_instance();
        return $CI->session->userdata('level') == 'admin';
    }
    
}