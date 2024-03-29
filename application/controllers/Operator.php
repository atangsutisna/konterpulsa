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

    public function reg_form()
    {
        $params = [
            'form_action' => site_url('operator/do_reg')
        ];
        $this->load->template(self::DIR_VIEW. '/form', $params);
    }

    public function do_reg()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

        $this->form_validation->set_rules('name', 'Nama', 'required', 
            array('required' => 'Nama harus diisi'));
        $this->form_validation->set_rules('prefix', 'Prefix', 'required', 
            array('required' => 'Prefix harus diisi'));
        if ($this->form_validation->run() == FALSE) {
            $this->reg_form();
        } else {
            $new_operator = [
                'name' => $this->input->post('name'),
                'prefixs' => $this->input->post('prefix'),
                'creation_time' => date('Y-m-d H:i:s'),
                'modification_time' => date('Y-m-d H:i:s')
            ];

            $this->load->model('Operator_model', 'operator');
            $operator_id = $this->operator->insert($new_operator);    
            
            $this->load->library('Prefixparser', 'prefixparser');
            $prefixs = $this->prefixparser->parse($this->input->post('prefix'));
            $this->load->model('Oprefix_model', 'oprefix');
            $this->oprefix->insert_all($operator_id, $prefixs);

            $this->session->set_flashdata('info', '1 operator telah berhasil ditambahkan');
            redirect('operator');
        }
    }

    public function view($id)
    {
        $this->load->model('Operator_model', 'operator');
        $operator = $this->operator->find_one($id);
        if ($operator == NULL) {
            show_404();
        }
        
        $params = array(
            'form_action' => site_url('operator/do_update'),
            'operator' => $operator,
        );

        $this->load->template(self::DIR_VIEW. '/form', $params);
    }

    public function do_update()
    {
        $id = $this->input->post('id');
        if (!isset($id)) {
            $this->session->set_flashdata('danger', 'Please select one data for update processing');
            redirect('operator');
        }

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

        $this->form_validation->set_rules('name', 'Nama', 'required', 
            array('required' => 'Nama harus diisi'));
        $this->form_validation->set_rules('prefix', 'Prefix', 'required', 
            array('required' => 'Prefix harus diisi'));

        if ($this->form_validation->run() == FALSE) {
            $this->view($id);
        } else {
            $modified_operator = [
                'name' => $this->input->post('name'),
                'prefixs' => $this->input->post('prefix'),
                'modification_time' => date('Y-m-d H:i:s')
            ];

            $this->load->model('Operator_model', 'operator');
            $this->operator->modify($id, $modified_operator);    
            
            $this->load->library('Prefixparser', 'prefixparser');
            $prefixs = $this->prefixparser->parse($this->input->post('prefix'));
            $this->load->model('Oprefix_model', 'oprefix');
            $this->oprefix->update_all($id, $prefixs);
            
            $this->session->set_flashdata('info', '1 operator telah berhasil diupdate');
            redirect('operator');
        }        
    }
}