<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prefixparser
{
    public function __construct()
    {
    }

    public function parse($prefix_string) 
    {
        $raw_prefixs = explode(",", $prefix_string);
        $prefixs = [];
        foreach ($raw_prefixs as $raw) {
            array_push($prefixs, trim($raw));
        }

        return $prefixs;
    }
}