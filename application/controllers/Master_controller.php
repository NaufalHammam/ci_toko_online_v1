<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Master_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
    	redirect('test/overview');
    }

}