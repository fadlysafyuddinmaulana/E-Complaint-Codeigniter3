<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Petugas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $user = $this->session->userdata('userdata_desa');

        if ($this->session->userdata('userdata_desa') == null) {
            redirect('Login');
        }
    }

    public function index()
    {
        $data['title']         = 'Keluhan Masyarakat';
        $data['aktif']         = 'petugas';
        $data['petugas']        = $this->db->get('petugas')->result();

        $this->load->view('template/header', $data);
        $this->load->view('petugas/index', $data);
        $this->load->view('template/footer', $data);
    }

    public function tambah_proses()
    {
        $nomor_petugas      = random_string('numeric', 25);
        $nama_petugas       = $this->input->post('nama_petugas');
        $tempat_lahir       = $this->input->post('tempat_lahir');
        $tanggal_lahir      = $this->input->post('tanggal_lahir');
        $agama              = $this->input->post('agama');
        $jk                 = $this->input->post('jenis_kelamin');
        $no_telp            = $this->input->post('no_telp');

        $this->form_validation->set_rules(
            'nama_petugas',
            'Nama Petugas',
            'required|trim',
            [
                'required' => 'Nama Petugas Wajib di Masukkan'
            ]
        );

        $this->form_validation->set_rules(
            'tempat_lahir',
            'Tempat Lahir',
            'required|trim',
            [
                'required' => 'Tempat Lahir WPetugas ajib di Masukkan'
            ]
        );

        $this->form_validation->set_rules(
            'tanggal_lahir',
            'Tanggal Lahir',
            'required|trim',
            [
                'required' => 'Tanggal Lahir Petugas Wajib di Masukkan'
            ]
        );

        $this->form_validation->set_rules(
            'agama',
            'Agama',
            'required|trim',
            [
                'required' => 'Agama Petugas Wajib di Pilih'
            ]
        );

        $this->form_validation->set_rules(
            'jenis_kelamin',
            'Jenis Kelamin',
            'required|trim',
            [
                'required' => 'Jenis Kelamin Petugas Wajib di Pilih'
            ]
        );

        $this->form_validation->set_rules(
            'no_telp',
            'No Telepon',
            'required|trim',
            [
                'required' => 'No Telepon Petugas Wajib di Masukkan'
            ]
        );

        //jika validasi gagal
        if ($this->form_validation->run() == FALSE) {
            $data['title']         = 'Keluhan Masyarakat';
            $data['aktif']         = 'petugas';
            $data['petugas']       = $this->db->get('petugas')->result();
            $data['modal_show']    = "$('#add-worker-modal').modal('show');";

            $this->load->view('template/header', $data);
            $this->load->view('petugas/index', $data);
            $this->load->view('template/footer', $data);
        } else {
            $config['upload_path']      = './Upload/Dokumen-Profile-Petugas/';
            $config['allowed_types']    = 'png|jpeg|jpg';
            $config['maax_size']        = '5048';
            $config['max_width']        = '540'; // pixel
            $config['max_height']       = '720'; // pixel
            $config['file_name'] = $_FILES['foto']['name'];

            $this->load->library('upload');
            $this->upload->initialize($config);

            if (!empty($_FILES['foto']['name'])) {
                if ($this->upload->do_upload('foto')) {
                    $foto = $this->upload->data();
                    $data = array(
                        'nomor_petugas'         => $nomor_petugas,
                        'nama_petugas'          => $nama_petugas,
                        'tanggal_lahir'         => $tanggal_lahir,
                        'tempat_lahir'          => $tempat_lahir,
                        'agama'                 => $agama,
                        'jk'                    => $jk,
                        'no_telp'               => $no_telp,
                        'active'                => '1',
                        'foto_petugas'          => $foto['file_name']
                    );
                    $this->M_account->proses_tambah($data, 'petugas');
                    redirect('petugas');
                } else {
                    $this->session->set_flashdata(
                        'gagal_upload',
                        '<div class="alert alert-danger alert-dismissible fade show" role="alert">Foto anda tidak sesuai dengan kriteria</div>'
                    );
                    $data['title']         = 'Keluhan Masyarakat';
                    $data['aktif']         = 'petugas';
                    $data['petugas']       = $this->db->get('petugas')->result();
                    $data['modal_show']    = "$('#add-worker-modal').modal('show');";

                    $this->load->view('template/header', $data);
                    $this->load->view('petugas/index', $data);
                    $this->load->view('template/footer', $data);
                }
            } else {
                $data = array(
                    'nomor_petugas'         => $nomor_petugas,
                    'nama_petugas'          => $nama_petugas,
                    'tanggal_lahir'         => $tanggal_lahir,
                    'tempat_lahir'          => $tempat_lahir,
                    'agama'                 => $agama,
                    'jk'                    => $jk,
                    'no_telp'               => $no_telp,
                    'active'                => '1',
                    'foto_petugas'          => 'default.png'
                );
                $this->M_account->proses_tambah($data, 'petugas');
                redirect('petugas');
            }
        }
    }

    public function edit($id_petugas)
    {
        $where = array('id_petugas' => $id_petugas);

        $data['title']      = 'Keluhan Masyarakat';
        $data['aktif']      = 'admin';
        $data['petugas']   = $this->M_account->get_data($where, 'petugas')->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('petugas/edit_petugas', $data);
        $this->load->view('template/footer', $data);
    }

    public function detail($id_petugas)
    {
        $where = array('id_petugas' => $id_petugas);

        $data['title']      = 'Keluhan Masyarakat';
        $data['aktif']      = 'admin';
        $data['petugas']   = $this->M_account->get_data($where, 'petugas')->row_array();


        $this->load->view('template/header', $data);
        $this->load->view('petugas/detail_petugas', $data);
        $this->load->view('template/footer', $data);
    }

    public function edit_proses()
    {
        $id_petugas             = $this->input->post('id');
        $nama_petugas           = $this->input->post('nama_petugas');
        $tempat_lahir           = $this->input->post('tempat_lahir');
        $tanggal_lahir          = $this->input->post('tanggal_lahir');
        $agama                  = $this->input->post('agama');
        $jk                     = $this->input->post('jenis_kelamin');
        $no_telp                = $this->input->post('no_telp');

        $path = './upload/Dokumen-Profile-Petugas/';

        $where = array('id_petugas' => $id_petugas);

        $config['upload_path']      = './Upload/Dokumen-Profile-Petugas/';
        $config['allowed_types']    = 'png|jpeg|jpg';
        $config['maax_size']        = '5048';
        $config['max_width']        = '540'; // pixel
        $config['max_height']       = '720'; // pixel
        $config['file_name'] = $_FILES['foto']['name'];

        $this->load->library('upload');
        $this->upload->initialize($config);

        if (!empty($_FILES['foto']['name'])) {
            if ($this->upload->do_upload('foto')) {
                $foto = $this->upload->data();
                $data = array(
                    'id_petugas'                => $id_petugas,
                    'nama_petugas'              => $nama_petugas,
                    'tanggal_lahir'             => $tanggal_lahir,
                    'tempat_lahir'              => $tempat_lahir,
                    'agama'                     => $agama,
                    'jk'                        => $jk,
                    'no_telp'                   => $no_telp,
                    'foto_petugas'              => $foto['file_name']
                );
                @unlink($path . $this->input->post('filelama'));
                $this->M_account->edit_petugas($data, $where);
                redirect('petugas');
            } else {
                $this->session->set_flashdata(
                    'gagal_upload',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">Foto anda tidak sesuai dengan kriteria</div>'
                );
                $data['title']         = 'Keluhan Masyarakat';
                $data['aktif']         = 'petugas';
                $data['petugas']       = $this->db->get('petugas')->result();
                $data['modal_show']    = "$('#add-worker-modal').modal('show');";

                $this->load->view('template/header', $data);
                $this->load->view('petugas/edit_petugas', $data);
                $this->load->view('template/footer', $data);
            }
        } else {
            $data = array(
                'id_petugas'                => $id_petugas,
                'nama_petugas'              => $nama_petugas,
                'tanggal_lahir'             => $tanggal_lahir,
                'tempat_lahir'              => $tempat_lahir,
                'agama'                     => $agama,
                'jk'                        => $jk,
                'no_telp'                   => $no_telp
            );
            $this->M_account->edit_petugas($data, $where);
            redirect('petugas');
        }
    }

    public function hapus($id, $foto)
    {
        $path = './upload/Dokumen-Profile-Petugas/';
        @unlink($path . $foto);

        $where = array('id_petugas' => $id);
        $this->M_account->delete($where);

        redirect('pengaduan/data');
    }

    public function add_userworker()
    {
        $id_petugas = $this->input->post('id_petugas');
        $username   = $this->input->post('username');
        $password   = md5($this->input->post('password'));

        $data = array(
            'username'      => $username,
            'password'      => $password,
            'active'        => 2
        );

        $where = array(
            'id_petugas'    => $id_petugas
        );

        $this->M_account->sql_update($where, $data, 'petugas');
        redirect('petugas');
    }
    public function edit_userworker()
    {
        $id_petugas         = $this->input->post('id_petugas');
        $username           = $this->input->post('username');
        $password           = md5($this->input->post('password'));
        $password_hidden    = $this->input->post('password');

        if ($password_hidden != '') {
            $data = array(
                'username'      => $username,
                'password'      => $password
            );
        } else {
            $data = array(
                'username'      => $username,
            );
        }


        $where = array(
            'id_petugas'    => $id_petugas
        );

        $this->M_account->sql_update($where, $data, 'petugas');
        redirect('petugas');
    }
}
