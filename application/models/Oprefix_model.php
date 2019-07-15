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
        $this->db->select('operator_prefixs.prefix, operator_prefixs.id, operators.name');
        $this->db->from('operator_prefixs');
        $this->db->join('operators', 'operator_prefixs.operator_id = operators.id');
        $this->db->like('operator_prefixs.prefix', $prefix);

        $result = $this->db->get();

        return $result->row_array();
    }

    public function insert_all($operator_id, $prefixs)
    {
        if (!is_array($prefixs)) {
            throw new  Exception("Prefixs must be array", 1);
        }

        if (count($prefixs) == 0) {
            throw new  Exception("Prefixs is required", 1);
        }

        $this->db->insert_batch(self::TBL_REFERENCE, array_map(function($prefix) use ($operator_id) {
            return [
                'operator_id' => $operator_id,
                'prefix' => $prefix,
                'creation_time' => date('Y-m-d H:i:s'),
                'modification_time' => date('Y-m-d H:i:s')
            ];
        }, $prefixs));
    }    

    public function update_all($operator_id, $prefixs)
    {
        $this->db->where('operator_id', $operator_id);
        $this->db->delete(self::TBL_REFERENCE);

        if (!is_array($prefixs)) {
            throw new  Exception("Prefixs must be array", 1);
        }

        if (count($prefixs) == 0) {
            throw new  Exception("Prefixs is required", 1);
        }

        $this->db->insert_batch(self::TBL_REFERENCE, array_map(function($prefix) use ($operator_id) {
            return [
                'operator_id' => $operator_id,
                'prefix' => $prefix,
                'creation_time' => date('Y-m-d H:i:s'),
                'modification_time' => date('Y-m-d H:i:s')
            ];
        }, $prefixs));
    }    
}