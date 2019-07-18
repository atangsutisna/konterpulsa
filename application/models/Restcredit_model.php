<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Restcredit_Model extends CI_Model 
{
    private $config;
    private $client;

    public function __construct()
    {
        parent::__construct();
        $CI =& get_instance();

        $CI->load->config('konterpulsa');
        $this->config = $CI->config->item('mobilepulsa');
        $this->client = new GuzzleHttp\Client(['verify'=> false]);
    }

    private function create_signature()
    {
        return md5($this->config['username'].$this->config['apikey'].'bl');
    }

    public function check_balance()
    {
        $response = $this->client->request('POST', $this->config['base_uri'], [
            'json' => [
                'commands' => 'balance',
                'username' => $this->config['username'],
                'sign' => '2a81b1338f8a71452ae6565242f3672f'
            ]
        ]);
        
        if ($response->getStatusCode() == 200) {
            $balance = json_decode($response->getBody()->getContents(), TRUE);
            return $balance['data']['balance'];
        }

        throw new Exception("There is something wrong with balance request");
    }


}