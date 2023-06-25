<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Penduduk extends CI_Controller
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
        $data['aktif']         = 'penduduk';
        $data['penduduk']    = $this->M_penduduk->get_all()->result();

        $this->load->view('template/header', $data);
        $this->load->view('penduduk/index', $data);
        $this->load->view('template/footer', $data);
    }

    public function tambah_penduduk()
    {
        $data['title']         = 'Keluhan Masyarakat';
        $data['aktif']         = 'penduduk';

        $this->load->view('template/header', $data);
        $this->load->view('penduduk/input_penduduk', $data);
        $this->load->view('template/footer', $data);
    }

    public function tambah_proses()
    {
        $nik            = $this->input->post('nik');
        $nama           = $this->input->post('nama');
        $tanggal_lahir  = $this->input->post('tanggal_lahir');
        $tempat_lahir   = $this->input->post('tempat_lahir');
        $agama          = $this->input->post('agama');
        $jk             = $this->input->post('jenis_kelamin');

        $this->form_validation->set_rules(
            'nik',
            'NIK',
            'required|numeric|is_unique[penduduk.nik]',
            [
                'is_unique' => 'NIK ini sudah di bikin',
                'required'  => 'NIK Wajib Di isi',
                'numeric'   => 'Harus Menggunakan Angka'
            ]
        );

        if ($this->form_validation->run() == FALSE) {
            $data['title']         = 'Keluhan Masyarakat';
            $data['aktif']         = 'penduduk';

            $this->load->view('template/header', $data);
            $this->load->view('penduduk/input_penduduk', $data);
            $this->load->view('template/footer', $data);
        } else {
            $config['upload_path']      = './Upload/Dokumen-Profile-Penduduk/';
            $config['allowed_types']    = 'png|jpeg|jpg';
            $config['max_size']        = '5048';
            $config['file_name'] = $_FILES['foto']['name'];

            $this->load->library('upload');
            $this->upload->initialize($config);

            if (!empty($_FILES['foto']['name'])) {
                if ($this->upload->do_upload('foto')) {
                    $foto = $this->upload->data();
                    $data = array(
                        'nik'               => $nik,
                        'nama'              => $nama,
                        'tempat_lahir'      => $tempat_lahir,
                        'tanggal_lahir'     => $tanggal_lahir,
                        'agama'             => $agama,
                        'jk'                => $jk,
                        'foto_penduduk'     => $foto['file_name']
                    );
                    $this->M_penduduk->proses_tambah($data, 'penduduk');
                    redirect('penduduk');
                }
            } else {
                $data = array(
                    'nik'               => $nik,
                    'nama'              => $nama,
                    'tempat_lahir'      => $tempat_lahir,
                    'tanggal_lahir'     => $tanggal_lahir,
                    'agama'             => $agama,
                    'jk'                => $jk,
                    'foto_penduduk'     => 'default.png'
                );
                $this->M_penduduk->proses_tambah($data, 'penduduk');
                redirect('penduduk');
            }
        }
    }

    public function detail($nik)
    {
        $where = array('id' => $nik);

        $data['title']         = 'Keluhan Masyarakat';
        $data['aktif']      = 'penduduk';
        $data['penduduk']   = $this->M_penduduk->get_nik($where, 'penduduk')->row_array();
        $data['keluhan']    = $this->M_pengaduan->get_nik($nik)->num_rows();


        $this->load->view('template/header', $data);
        $this->load->view('penduduk/detail_penduduk', $data);
        $this->load->view('template/footer', $data);
    }

    public function edit($nik)
    {
        $where = array(
            'id' => $nik
        );

        $data['title']         = 'Keluhan Masyarakat';
        $data['aktif']         = 'penduduk';

        $data['penduduk']      = $this->M_penduduk->get_nik($where, 'penduduk')->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('penduduk/edit_penduduk', $data);
        $this->load->view('template/footer', $data);
    }

    public function edit_proses()
    {
        $id             = $this->input->post('id');
        $nik            = $this->input->post('nik');
        $nama           = $this->input->post('nama');
        $tanggal_lahir  = $this->input->post('tanggal_lahir');
        $tempat_lahir   = $this->input->post('tempat_lahir');
        $agama          = $this->input->post('agama');
        $jk             = $this->input->post('jenis_kelamin');

        $path = './upload/Dokumen-Profile-Penduduk/';

        $where = array('id' => $id);

        $config['upload_path']      = './upload/Dokumen-Profile-Penduduk/';
        $config['allowed_types']    = 'png|jpeg|jpg';
        $config['maax_size']        = '5048';
        $config['file_name'] = $_FILES['foto']['name'];

        $this->load->library('upload');
        $this->upload->initialize($config);

        if (!empty($_FILES['foto']['name'])) {
            if ($this->upload->do_upload('foto')) {
                $foto = $this->upload->data();
                $data = array(
                    'nik'               => $nik,
                    'nik_account'       => $nik,
                    'nama'              => $nama,
                    'tempat_lahir'      => $tempat_lahir,
                    'tanggal_lahir'     => $tanggal_lahir,
                    'agama'             => $agama,
                    'jk'                => $jk,
                    'foto_penduduk'     => $foto['file_name']
                );

                @unlink($path . $this->input->post('filelama'));
                $this->M_penduduk->edit_proses($data, $where);
                redirect('penduduk');
            }
        } else {
            $data = array(
                'nik'               => $nik,
                'nik_account'       => $nik,
                'nama'              => $nama,
                'tempat_lahir'      => $tempat_lahir,
                'tanggal_lahir'     => $tanggal_lahir,
                'agama'             => $agama,
                'jk'                => $jk
            );
            $this->M_penduduk->edit_proses($data, $where);
            redirect('penduduk');
        }
    }

    public function hapus($id, $foto)
    {
        $path = './upload/Dokumen-Profile-Penduduk/';
        @unlink($path . $foto);

        $where = array('id' => $id);
        $this->M_penduduk->delete($where);

        redirect('pengaduan/data');
    }
}
