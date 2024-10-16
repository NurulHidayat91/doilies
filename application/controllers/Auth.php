<?php
class Auth extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }



    function index()
    {
        $this->load->view('auth/login');
    }

    function cheklogin()
    {
        $username      = $this->input->post('username');
        $password      = $this->input->post('password');

        // query chek users
        $this->db->where('username', $username);
        $this->db->where('password',  md5($password));
        $user       = $this->db->get('tbl_user');
        $row = $this->user_model->get_email_user($this->input->post('username'), md5($password));
        // $rowPassword = $this->user_model->get_password_user(md5($this->input->post('password')));


        if ($row->is_aktif == "n") {
            $this->session->set_flashdata('status_login', 'Username tidak aktif');
            redirect('auth');
        } elseif (!$row) {
            $this->session->set_flashdata('status_login', 'username atau password yang anda input salah');
            redirect('auth');
        } else {
            $this->session->set_userdata($user->row_array());
            redirect('dashboard');
        }

        // if ($user->num_rows() > 0) {
        //     // retrive user data to session
        //     $this->session->set_userdata($user->row_array());
        //     redirect('user');
        // } else {
        //     $this->session->set_flashdata('status_login', 'username atau password yang anda input salah');
        //     redirect('auth');
        // }
    }

    function logout()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('status_login', 'Anda sudah berhasil keluar dari aplikasi');
        redirect('auth');
    }
}
