<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged();
    }

    public function index()
    {
        echo "admin";
    }
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */