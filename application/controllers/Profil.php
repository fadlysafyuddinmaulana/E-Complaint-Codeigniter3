<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Profil extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $user = $this->session->userdata('userdata_desa');

        if ($this->session->userdata('userdata_desa') == null) {
            redirect('Login');
        }
    }

    public function profil_user($nik)
    {
        $where = array('nik' => $nik);

        $data['title']         = 'Keluhan Masyarakat';
        $data['aktif']      = 'profil';
        $data['penduduk']   = $this->M_penduduk->get_nik($where, 'penduduk')->row_array();
        $this->load->view('template/header', $data);
        $this->load->view('profil/profil', $data);
        $this->load->view('template/footer', $data);
    }

    public function profil_admin($id_admin)
    {
        $where = array('id_admin' => $id_admin);
        $data['title']         = 'Keluhan Masyarakat';
        $data['aktif']      = 'profil';
        $data['profil'] = $this->M_account->get_data($where, 'admin')->row_array();
        $this->load->view('template/header', $data);
        $this->load->view('profil/profil', $data);
        $this->load->view('template/footer', $data);
    }

    public function profil_petugas($idp)
    {
        $where = array('id_petugas' => $idp);
        $data['title']         = 'Keluhan Masyarakat';
        $data['aktif']      = 'profil';
        $data['profil'] = $this->M_account->get_data($where, 'petugas')->result();
        $this->load->view('template/header', $data);
        $this->load->view('profil/profil', $data);
        $this->load->view('template/footer', $data);
    }

    public function edit_password_petugas($idp)
    {
        $where = array(
            'id_petugas' => $idp
        );

        $data['title']         = 'Keluhan Masyarakat';
        $data['aktif']      = 'akun';
        $data['profil']     = $this->M_account->get_data($where, 'petugas')->result();
        $this->load->view('template/header', $data);

        $this->load->view('profil/edit_password', $data);
        $this->load->view('template/footer', $data);
    }

    public function edit_username_penduduk($nik)
    {
        $where = array('nik' => $nik);

        $data['title']         = 'Keluhan Masyarakat';
        $data['aktif']      = 'akun';
        $data['profil']     = $this->M_penduduk->get_nik($where, 'penduduk')->row_array();
        $this->load->view('template/header', $data);

        $this->load->view('profil/edit_password', $data);
        $this->load->view('template/footer', $data);
    }

    public function edit_password_user($nik)
    {
        $where = array('nik' => $nik);

        $data['title']         = 'Keluhan Masyarakat';
        $data['aktif']      = 'akun';
        $data['profil']     = $this->M_penduduk->get_nik($where, 'penduduk')->row_array();
        $this->load->view('template/header', $data);

        $this->load->view('profil/edit_password', $data);
        $this->load->view('template/footer', $data);
    }

    public function edit_password_admin($id_admin)
    {
        $where = array('id_admin' => $id_admin);

        $data['title']         = 'Keluhan Masyarakat';
        $data['aktif']      = 'akun';
        $data['profil'] = $this->M_account->get_admin($where, 'admin')->row_array();

        $this->load->view('template/header', $data);

        $this->load->view('profil/edit_password', $data);
        $this->load->view('template/footer', $data);
    }

    public function proses_password_admin($id_admin)
    {
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|trim',
            array(
                'required' => '<div class="alert alert-danger"><strong>Error!</strong> Password Tidak Boleh Kosong.</div>'
            )
        );
        $this->form_validation->set_rules(
            'password-verfication',
            'Konfirmasi Password',
            'required|matches[password]|trim',
            array(
                'required' => '<div class="alert alert-danger"><strong>Error!</strong> Konfirmasi Password Tidak Boleh Kosong.</div>',
                'matches' => '<div class="alert alert-danger"><strong>Error!</strong> Password Tidak Sama.</div>',
            )
        );

        if ($this->form_validation->run() == FALSE) {
            $where = array('id_admin' => $id_admin);

            $data['title']         = 'Keluhan Masyarakat';
            $data['aktif']      = 'akun';
            $data['profil'] = $this->M_account->get_admin($where, 'admin')->row_array();

            $this->load->view('template/header', $data);

            $this->load->view('profil/edit_password', $data);
            $this->load->view('template/footer', $data);
        } else {
            $cek_id        = $this->db->query("SELECT * FROM admin WHERE id_admin = '$id_admin' ")->row_array();

            $pass_lama_in   = MD5($this->input->post('password_lama'));
            $pass_baru      = MD5($this->input->post('password'));

            if ($cek_id['password'] == $pass_lama_in) {
                $data = array('password' => $pass_baru);

                $this->db->where('id_admin', $id_admin);
                $this->db->update('admin', $data);

                $this->session->set_flashdata('sukses_edit', '1');
                redirect('Profil/edit_password_admin/' . $id_admin);
            } else {
                $this->session->set_flashdata('gagal_edit', '1');
                redirect('Profil/edit_password_admin/' . $id_admin);
            }
        }
    }

    public function proses_password_petugas($idp)
    {
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|trim'

        );
        $this->form_validation->set_rules(
            'password-verfication',
            'Konfirmasi Password',
            'required|matches[password]|trim'
        );

        if ($this->form_validation->run() == FALSE) {
            $where = array('id_petugas' => $idp);

            $data['title']          = 'Keluhan Masyarakat';
            $data['aktif']          = 'akun';
            $data['profil']         = $this->M_account->get_data($where, 'petugas')->row_array();

            $this->load->view('template/header', $data);
            $this->load->view('profil/edit_password', $data);
            $this->load->view('template/footer', $data);
        } else {

            $cek_idp        = $this->db->query("SELECT * FROM petugas WHERE id_petugas = '$idp' ")->row_array();

            $old_username   = $this->input->post('username_lama');
            $new_username   = $this->input->post('username_baru');

            $pass_lama_in   = MD5($this->input->post('password_lama'));
            $pass_baru      = MD5($this->input->post('password'));

            if ($cek_idp['username'] == $old_username) {
                $data = array('username' => $new_username);

                $this->db->where('id_petugas', $idp);
                $this->db->update('petugas', $data);

                $this->session->set_flashdata('sukses_edit', '1');
                redirect('dashboard/dashboard_petugas');
            } elseif ($cek_idp['password'] == $pass_lama_in) {
                $data = array('password' => $pass_baru);

                $this->db->where('id_petugas', $idp);
                $this->db->update('petugas', $data);

                $this->session->set_flashdata('sukses_edit', '1');
                redirect('dashboard/dashboard_petugas');
            } else {
                $this->session->set_flashdata('gagal_edit', '1');
                redirect('Profil/edit_password_petugas/' . $idp);
            }
        }
    }

    public function proses_username_penduduk($nik)
    {
        $cek_nik        = $this->db->query("SELECT * FROM penduduk WHERE nik = '$nik' ")->row_array();

        $old_username   = $this->input->post('username_lama');
        $new_username   = $this->input->post('username_baru');

        if ($cek_nik['username'] == $old_username) {
            $data = array('username' => $new_username);

            $this->db->where('nik', $nik);
            $this->db->update('penduduk', $data);

            redirect('dashboard/dashboard_user');
        } else {
            redirect('Profil/edit_username_penduduk/' . $nik);
        }
    }

    public function proses_username_petugas($nik)
    {
        $cek_nik        = $this->db->query("SELECT * FROM penduduk WHERE nik = '$nik' ")->row_array();

        $old_username   = $this->input->post('username_lama');
        $new_username   = $this->input->post('username_baru');

        if ($cek_nik['username'] == $old_username) {
            $data = array('username' => $new_username);

            $this->db->where('nik', $nik);
            $this->db->update('penduduk', $data);

            redirect('dashboard/dashboard_user');
        } else {
            redirect('Profil/edit_username_penduduk/' . $nik);
        }
    }

    public function proses_password_penduduk($nik)
    {
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|trim'

        );
        $this->form_validation->set_rules(
            'password-verfication',
            'Konfirmasi Password',
            'required|matches[password]|trim'
        );

        if ($this->form_validation->run() == FALSE) {
            $where = array('nik' => $nik);

            $data['title']         = 'Keluhan Masyarakat';
            $data['aktif']      = 'akun';
            $data['profil'] = $this->M_account->get_data($where, 'penduduk')->row_array();

            $this->load->view('template/header', $data);
            $this->load->view('profil/edit_password', $data);
            $this->load->view('template/footer', $data);
        } else {
            $cek_nik        = $this->db->query("SELECT * FROM penduduk WHERE nik = '$nik' ")->row_array();

            $pass_lama_in   = MD5($this->input->post('password_lama'));
            $pass_baru      = MD5($this->input->post('password'));

            if ($cek_nik['password'] == $pass_lama_in) {
                $data = array('password' => $pass_baru);

                $this->db->where('nik', $nik);
                $this->db->update('penduduk', $data);

                redirect('dashboard/dashboard_user');
            } else {
                redirect('Profil/edit_password_user/' . $nik);
            }
        }
    }

    public function edit_akun_proses($nik)
    {
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|trim',
            array(
                'required' => '<div class="alert alert-danger"><strong>Error!</strong> Password Tidak Boleh Kosong.</div>'
            )
        );
        $this->form_validation->set_rules(
            'password2',
            'Konfirmasi Password',
            'required|matches[password]|trim',
            array(
                'required' => '<div class="alert alert-danger"><strong>Error!</strong> Konfirmasi Password Tidak Boleh Kosong.</div>',
                'matches' => '<div class="alert alert-danger"><strong>Error!</strong> Password Tidak Sama.</div>',
            )
        );

        //jika validasi gagal
        if ($this->form_validation->run() == FALSE) {
            $data['title']         = 'Keluhan Masyarakat';
            $data['aktif']      = 'akun';
            $data['profil']     = $this->M_penduduk->get_nik($nik)->row_array();
            $this->load->view('profil/edit_akun', $data);
        } else {
            $cek_nik        = $this->db->query("SELECT * FROM penduduk WHERE nik = '$nik' ")->row_array();


            $pass_lama_in   = MD5($this->input->post('password_lama'));
            $pass_baru      = MD5($this->input->post('password'));

            if ($cek_nik['password'] == $pass_lama_in) {
                $data = array('password' => $pass_baru);

                $this->db->where('nik', $nik);
                $this->db->update('penduduk', $data);

                $this->session->set_flashdata('sukses_edit', '1');
                redirect('Profil/edit_akun/' . $nik);
            } else {
                $this->session->set_flashdata('gagal_edit', '1');
                redirect('Profil/edit_akun/' . $nik);
            }
        }
    }

    public function edit_akun_admin_proses($id_admin)
    {
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|trim',
            array(
                'required' => '<div class="alert alert-danger"><strong>Error!</strong> Password Tidak Boleh Kosong.</div>'
            )
        );
        $this->form_validation->set_rules(
            'password2',
            'Konfirmasi Password',
            'required|matches[password]|trim',
            array(
                'required' => '<div class="alert alert-danger"><strong>Error!</strong> Konfirmasi Password Tidak Boleh Kosong.</div>',
                'matches' => '<div class="alert alert-danger"><strong>Error!</strong> Password Tidak Sama.</div>',
            )
        );

        //jika validasi gagal
        if ($this->form_validation->run() == FALSE) {
            $data['title']         = 'Keluhan Masyarakat';
            $data['aktif']      = 'akun';
            $data['profil']     = $this->M_account->get_admin($id_admin)->row_array();
            $this->load->view('profil/edit_akun_admin', $data);
        } else {
            $cek_id        = $this->db->query("SELECT * FROM admin WHERE id_admin = '$id_admin' ")->row_array();


            $pass_lama_in   = MD5($this->input->post('password_lama'));
            $pass_baru      = MD5($this->input->post('password'));

            if ($cek_id['password'] == $pass_lama_in) {
                $data = array('password' => $pass_baru);

                $this->db->where('id_admin', $id_admin);
                $this->db->update('admin', $data);

                $this->session->set_flashdata('sukses_edit', '1');
                redirect('Profil/edit_akun_admin/' . $id_admin);
            } else {
                $this->session->set_flashdata('gagal_edit', '1');
                redirect('Profil/edit_akun_admin/' . $id_admin);
            }
        }
    }
}

/* End of file profil.php */
/* Location: ./application/controllers/profil.php */
