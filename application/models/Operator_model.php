<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Operator_model extends MY_Model 
{
    const TBL_REFERENCE = 'operators';
    const PRIMARY_KEY = 'id';

    public function __construct()
    {
        parent::__construct(self::TBL_REFERENCE, self::PRIMARY_KEY);
    }


    public function find_all($term = NULL, $first = 0, $count = 20, $order = 'modification_time', $direction = 'DESC')
    {
        if ($term != NULL && $term !== '') {
            $this->db->group_start();
            $this->db->like('name', $term);
            $this->db->group_end();
        }

        $this->db->limit(
            isset($count) ? $count : 20, 
            isset($first) ? $first : 0
        );
        $this->db->order_by($order, $direction);
        $query = $this->db->get($this->table_name);

        return $query->result();
    }

    public function count_all($term = NULL)
    {
        if ($term != NULL && $term !== '') {
            $this->db->group_start();
            $this->db->like('name', $term);
            $this->db->group_end();
        }

        $this->db->from($this->table_name);
        return $this->db->count_all_results();
    }
    
    public function find_one($id)
    {
        $this->db->where(self::PRIMARY_KEY, $id);
        $query = $this->db->get($this->table_name);

        return $query->row();
    }

    public function modify($id, $operator) 
    {
        $this->db->where(self::PRIMARY_KEY, $id);
        $this->db->update($this->table_name, $operator);
    }
}