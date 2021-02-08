<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function index()
    {
        $data['title']         = 'Selamat di Keluhan Masyarakat';

        $this->load->view('template/header_login', $data);
        $this->load->view('starter_page/login_user');
        $this->load->view('template/footer_login');
    }

    public function admin()
    {
        $data['title']         = 'Admin keluhan Masyarakat';

        $this->load->view('template/header_login', $data);
        $this->load->view('starter_page/login_admin');
        $this->load->view('template/footer_login');
    }

    public function petugas()
    {
        $data['title']         = 'Admin keluhan Masyarakat';

        $this->load->view('template/header_login', $data);
        $this->load->view('starter_page/login_petugas');
        $this->load->view('template/footer_login');
    }

    public function register()
    {
        $data['title']         = 'Keluhan Masyarakat';

        $this->load->view('template/header_login', $data);
        $this->load->view('starter_page/register');
        $this->load->view('template/footer_login');
    }


    public function proses_admin()
    {
        $p         = md5($this->input->post('password'));
        $cek       = $this->M_login->cek_admin($p);

        if ($cek->num_rows() > 0) {
            $user_data    = $cek->row_array();
            $session['id_admin']        = $user_data['id_admin'];
            $session['password']        = $user_data['password'];
            $session['akses']           = 'admin';
            $this->session->set_userdata('userdata_desa', $session);
            redirect('dashboard/dashboard_admin');
        } else {
            redirect('Login/admin');
        }
    }

    public function proses_user()
    {

        $u      = $this->input->post('username');
        $p      = md5($this->input->post('password'));
        $cek    = $this->M_login->cek_user($u, $p);

        if ($cek->num_rows() > 0) {
            $user_data                  = $cek->row_array();
            $session['nik']             = $user_data['nik'];
            $session['nama']            = $user_data['nama'];
            $session['tempat_lahir']    = $user_data['tempat_lahir'];
            $session['tanggal_lahir']   = $user_data['tanggal_lahir'];
            $session['jk']              = $user_data['jk'];
            $session['agama']           = $user_data['agama'];
            $session['foto_penduduk']   = $user_data['foto_penduduk'];
            $session['no_telp']         = $user_data['no_telp'];
            $session['username']        = $user_data['username'];
            $session['password']        = $user_data['password'];
            $session['akses']           = 'user';
            $this->session->set_userdata('userdata_desa', $session);
            redirect('dashboard/dashboard_user');
        } else {
            redirect('Login/index');
        }
    }

    public function proses_petugas()
    {
        $u         = $this->input->post('username');
        $p         = md5($this->input->post('password'));
        $cek       = $this->M_login->cek($u, $p);

        if ($cek->num_rows() > 0) {
            $user_data    = $cek->row_array();
            $session['id_petugas']          = $user_data['id_petugas'];
            $session['nomor_petugas']       = $user_data['nomor_petugas'];
            $session['nama_petugas']        = $user_data['nama_petugas'];
            $session['no_telp']             = $user_data['no_telp'];
            $session['tempat_lahir']        = $user_data['tempat_lahir'];
            $session['tanggal_lahir']       = $user_data['tanggal_lahir'];
            $session['jk']                  = $user_data['jk'];
            $session['foto_petugas']        = $user_data['foto_petugas'];
            $session['username']            = $user_data['username'];
            $session['password']            = $user_data['password'];
            $session['akses']               = 'petugas';
            $this->session->set_userdata('userdata_desa', $session);
            redirect('dashboard/dashboard_petugas');
        } else {
            redirect('Login/petugas');
        }
    }

    public function register_proses()
    {
        $this->form_validation->set_rules(
            'val-nik',
            'NIK',
            'is_unique[penduduk.nik_account]',
            ['is_unique' => 'NIK ini sudah di gunakan']
        );

        $this->form_validation->set_rules(
            'val-password',
            'password',
            'required',
            [
                'required' => 'Password Wajib Di isi!'
            ]
        );

        $this->form_validation->set_rules(
            'val-password-verification',
            'Password Verification',
            'required|matches[val-password]',
            [
                'required' => 'Password Wajib Di isi!',
                'matches'  => 'Passwod Tidak Sama!'
            ]
        );

        $this->form_validation->set_rules(
            'terms',
            'Accept Rules',
            'required',
            [
                'required'  => 'Anda Harus Menyetujui Aturan ini'
            ]
        );
        if ($this->form_validation->run() == FALSE) {
            $data['title']         = 'Keluhan Masyarakat';

            $this->load->view('template/header_login', $data);
            $this->load->view('starter_page/register');
            $this->load->view('template/footer_login');
        } else {
            $nik = $this->input->post('val-nik');

            $cek_nik = $this->M_login->cek_register($nik)->num_rows();

            if ($cek_nik < 1) {
                $data['title']         = 'Keluhan Masyarakat';

                $this->load->view('template/header_login', $data);
                $this->load->view('starter_page/register');
                $this->load->view('template/footer_login');
            } else {
                $this->M_login->register($nik);
                redirect('Login');
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Login');
    }
}
