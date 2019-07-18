<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Admin_Controller 
{

    const DIR_VIEW = 'home';

	public function index()
	{
        $this->load->model('Restcredit_model', 'restcredit');
        $balance = $this->restcredit->check_balance();
        $params = [
            'balance' => $balance
        ];
        $this->load->template(self::DIR_VIEW. '/index', $params);
    }
}