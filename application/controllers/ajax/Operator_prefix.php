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
        $this->load->model('Credit_model', 'credit');
    }

    public function index_get()
    {
        $prefix = $this->input->get('prefix');
        $operator_prefix = $this->operator_prefix->find_by_prefix($prefix);
        $response = ['operator' => $operator_prefix];
        if ($operator_prefix != NULL) {
            $available_credits = $this->credit->find_by_operator_id($operator_prefix['id']);
            $response['operator']['nominals'] = $available_credits;
        }

        $this->response($response, REST_Controller::HTTP_OK);
    }

}
