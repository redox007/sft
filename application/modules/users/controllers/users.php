<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("user_model");
    }

    public function index() {
        $data['users'] = $this->user_model->get_users();
        $this->load->view('users_view', $data);
    }

}

/* End of file users.php */
/* Location: ./application/modules/users/controllers/users.php */