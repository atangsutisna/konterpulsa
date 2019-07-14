<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction_model extends MY_Model 
{
    const TBL_REFERENCE = 'transactions';
    const PRIMARY_KEY = 'id';

    public function __construct()
    {
        parent::__construct(self::TBL_REFERENCE, self::PRIMARY_KEY);
    }


    public function find_all($term = NULL, $first = 0, $count = 20, $order = 'modification_time', $direction = 'DESC')
    {
        $this->db->select('transactions.*, operators.name AS operator_name');
        $this->db->from(self::TBL_REFERENCE);
        $this->db->join('operators', 'transactions.operator_id = operators.id', 'inner');
        if ($term != NULL && $term !== '') {
            $this->db->group_start();
            $this->db->like('operators.name', $term);
            $this->db->like('transactions.phone_number', $term);
            $this->db->group_end();
        }

        $this->db->limit(
            isset($count) ? $count : 20, 
            isset($first) ? $first : 0
        );
        $this->db->order_by($order, $direction);
        $query = $this->db->get();

        return $query->result();
    }

    public function count_all($term = NULL)
    {
        $this->db->from(self::TBL_REFERENCE);
        $this->db->join('operators', 'transactions.operator_id = operators.id', 'inner');
        if ($term != NULL && $term !== '') {
            $this->db->group_start();
            $this->db->like('operators.name', $term);
            $this->db->like('transactions.phone_number', $term);
            $this->db->group_end();
        }

        return $this->db->count_all_results();
    }
    
    public function find_one($id)
    {
        $this->db->where(self::PRIMARY_KEY, $id);
        $query = $this->db->get($this->table_name);

        return $query->row();
    }

    public function modify($id, $book) 
    {
        $this->db->where(self::PRIMARY_KEY, $id);
        $this->db->update($this->table_name, $book);
    }
}