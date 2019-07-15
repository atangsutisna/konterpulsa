<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prefix_parser extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

	public function index()
	{
        $this->load->library('unit_test');
        $this->load->library('Prefixparser', 'prefixparser');
        $str_prefixs = '0838,0831,0832,0833';
        $prefixs = $this->prefixparser->parse($str_prefixs);
        print_r($prefixs);
    }
}