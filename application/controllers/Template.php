<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
 //nama class harus huruf besar, nama harus sama dengan file
class Template extends CI_Controller { 
    public function index()
    {
        $this->load->view('template');
    }
 
}