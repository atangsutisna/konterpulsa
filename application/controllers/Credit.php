<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Credit extends Admin_Controller 
{

    const DIR_VIEW = 'credit';

	public function index()
	{
        $params = array(
            'js_resources' => ['assets/js/credit/index.js']
        );
        $this->load->template(self::DIR_VIEW. '/index', $params);
    }
}