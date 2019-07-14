<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Operator extends Admin_Controller 
{

    const DIR_VIEW = 'operator';

	public function index()
	{
        $params = array(
            'js_resources' => ['assets/js/operator/index.js']
        );
        $this->load->template(self::DIR_VIEW. '/index', $params);
    }
}