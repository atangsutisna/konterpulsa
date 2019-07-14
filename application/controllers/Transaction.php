<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends Admin_Controller 
{

    const DIR_VIEW = 'transaction';

	public function index()
	{
        $params = array(
            'js_resources' => ['assets/js/transaction/index.js']
        );
        $this->load->template(self::DIR_VIEW. '/index', $params);
    }
}