<?php

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

use Restserver\Libraries\REST_Controller;

class Operator_prefix extends REST_Controller 
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Oprefix_model', 'operator_prefix');
    }

    public function index_get()
    {
        $prefix = $this->input->get('prefix');
        $operator_prefix = $this->operator_prefix->find_by_prefix($prefix);
        $response = [
            'operator_prefix' => $operator_prefix
        ];
        $this->response($response, REST_Controller::HTTP_OK);
    }

}