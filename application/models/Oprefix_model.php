<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Oprefix_model extends MY_Model 
{
    const TBL_REFERENCE = 'operator_prefixs';
    const PRIMARY_KEY = 'id';

    public function __construct()
    {
        parent::__construct(self::TBL_REFERENCE, self::PRIMARY_KEY);
    }

    public function find_by_prefix($prefix)
    {
        $this->db->select('operator_prefixs.prefix, operators.name as operator_name');
        $this->db->from('operator_prefixs');
        $this->db->join('operators', 'operator_prefixs.operator_id = operators.id');
        $this->db->like('operator_prefixs.prefix', $prefix);

        $result = $this->db->get();

        return $result->row();
    }

}