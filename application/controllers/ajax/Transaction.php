<?php

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

use Restserver\Libraries\REST_Controller;

class Transaction extends REST_Controller 
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Transaction_model', 'transaction');
        $this->load->model('Credit_model', 'credit');
    }

    public function index_get()
    {
        $draw = $this->input->get('draw');
        $term = $this->input->get('search');
        $first = $this->input->get('start');
        $count = $this->input->get('length');
        $columns = $this->input->get('columns');
        $order_idx = $this->input->get('order')[0]['column'];
        $order = $columns[$order_idx]['data'];
        $direction = $this->input->get('order')[0]['dir'];

        $transactions = $this->transaction->find_all($term['value'], $first, $count, $order, $direction);
        $total_rows = $this->transaction->count_all($term['value']);

        $response = array(
            'draw' => isset($draw) ? $draw : 1,
            'recordsTotal' => $total_rows,
            'recordsFiltered' =>  $total_rows,            
            'data' => $transactions
        );
        
        $this->response($response, REST_Controller::HTTP_OK);
    }

    public function index_post()
    {
        $operator_id = $this->post('operator_id');
        $nominal_id = $this->post('nominal_id');
        $phone_number = $this->post('phone_number');

        if (!isset($operator_id) && $operator_id == NULL) {
            $this->response([
                'code' => REST_Controller::HTTP_BAD_REQUEST,
                'message' => 'Operator is required'
            ], REST_Controller::HTTP_BAD_REQUEST);    
        }

        if (!isset($nominal_id) && $nominal_id == NULL) {
            $this->response([
                'code' => REST_Controller::HTTP_BAD_REQUEST,
                'message' => 'Nominal is required'
            ], REST_Controller::HTTP_BAD_REQUEST);    
        }

        if (!isset($phone_number) && $phone_number == NULL) {
            $this->response([
                'code' => REST_Controller::HTTP_BAD_REQUEST,
                'message' => 'Phone number is required'
            ], REST_Controller::HTTP_BAD_REQUEST);    
        }

        $nominal = $this->credit->find_one($nominal_id);
        $this->transaction->insert([
            'operator_id' => $operator_id,
            'phone_number' => $phone_number,
            'nominal' => $nominal->nominal,
            'original_price' => $nominal->original_price,
            'price' => $nominal->price,
            'status' => 'success', //should not hardcode
            'creation_time' => date('Y-m-d H:i:s'),
            'modification_time' => date('Y-m-d H:i:s')
        ]);

        $this->response(REST_Controller::HTTP_CREATED);
    }

}