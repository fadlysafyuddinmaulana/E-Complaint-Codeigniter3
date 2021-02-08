    <?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    class Pengaduan extends CI_Controller
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
            $data['aktif']         = 'pengaduan';
            $data['pengaduan'] = $this->M_pengaduan->get_all()->result();
            $this->load->view('template/header', $data);
            $this->load->view('keluhan/index', $data);
            $this->load->view('template/footer', $data);
        }

        public function data()
        {
            $user = $this->session->userdata('userdata_desa');
            $data['title']      = "Keluhan Masyarakat";
            $data['aktif']      = 'data';
            $data['pengaduan'] = $this->M_pengaduan->get_nik($user['nik'])->result();
            $this->load->view('template/header', $data);
            $this->load->view('keluhan/index', $data);
            $this->load->view('template/footer', $data);
        }

        public function tambah()
        {
            $data['title']      = 'Keluhan Masyarakat';
            $data['aktif']      = 'input';

            $this->load->view('template/header', $data);
            $this->load->view('keluhan/input_keluhan', $data);
            $this->load->view('template/footer', $data);
        }

        public function tambah_proses()
        {
            $this->form_validation->set_rules(
                'pengaduan',
                'Pengaduan',
                'required|trim',
                array(
                    'required' => '<div class="alert alert-danger">Gagal! Form Pengaduan Tidak Boleh Kosong.</div>'
                )
            );

            //jika validasi gagal
            if ($this->form_validation->run() == FALSE) {
                $data['title']      = 'Keluhan Masyarakat';
                $data['aktif']      = 'input';

                $this->load->view('template/header', $data);
                $this->load->view('keluhan/input_keluhan', $data);
                $this->load->view('template/footer', $data);
            } else {
                //setting config untuk library upload
                $config['upload_path']      = './upload/dokumen-pengaduan/';
                $config['allowed_types']    = 'gif|jpg|png|jpeg';
                $config['max_size']         = '10000';

                //pemanggilan librabry upload
                $this->load->library('upload', $config);

                //jika upload gagal
                if (!$this->upload->do_upload('foto')) {
                    $data['title']      = 'Keluhan Masyarakat';
                    $data['aktif']      = 'input';

                    $this->session->set_flashdata('sukses_tambah', '1');

                    $this->load->view('template/header', $data);
                    $this->load->view('keluhan/input_keluhan', $data);
                    $this->load->view('template/footer', $data);
                    //jika upload berhasil
                } else {
                    $gambar = $this->upload->data();
                    $this->M_pengaduan->tambah($gambar['file_name']);
                    redirect('pengaduan/data');
                }
            }
        }

        public function detail($id_pengaduan)
        {
            $data['title']      = 'Keluhan Masyarakat';
            $data['aktif']      = 'data';
            $data['pengaduan']  = $this->M_pengaduan->get_id($id_pengaduan)->row_array();
            $this->load->view('template/header', $data);
            $this->load->view('keluhan/detail_keluhan', $data);
            $this->load->view('template/footer', $data);
        }
        public function detail2($id_pengaduan)
        {
            $data['title']      = 'Keluhan Masyarakat';
            $data['aktif']      = 'data';
            $data['pengaduan']  = $this->M_pengaduan->get_id($id_pengaduan)->row_array();
            $this->load->view('template/header', $data);
            $this->load->view('keluhan/detail_keluhan_admin', $data);
            $this->load->view('template/footer', $data);
        }

        public function edit($id_pengaduan)
        {
            $data['title']      = 'Keluhan Masyarakat';
            $data['aktif']      = 'data';
            $data['pengaduan']  = $this->M_pengaduan->get_id($id_pengaduan)->row_array();
            $this->load->view('template/header', $data);
            $this->load->view('keluhan/edit_keluhan', $data);
            $this->load->view('template/footer', $data);
        }

        public function edit_proses2($id_pengaduan)
        {
            $this->form_validation->set_rules(
                'pengaduan',
                'Pengaduan',
                'required|trim',
                array(
                    'required' => '<div class="alert alert-danger">Gagal! Form Pengaduan Tidak Boleh Kosong.</div>'
                )
            );

            //jika validasi gagal
            if ($this->form_validation->run() == FALSE) {
                $data['judul']      = 'Keluhan Masyarakat';
                $data['aktif']      = 'input';
                $data['pengaduan']  = $this->M_pengaduan->get_id($id_pengaduan)->row_array();
                $this->load->view('template/header', $data);

                $this->load->view('pengaduan/input', $data);
                $this->load->view('template/footer', $data);
            } else {
                if ($_FILES["foto"]["name"] == "") {
                    $foto_lama = $this->input->post('foto_lama');
                    $this->M_pengaduan->edit_proses($id_pengaduan, $foto_lama);
                    $this->M_history->log_activity_complaint();
                    $this->session->set_flashdata('sukses_edit', '1');
                    redirect('pengaduan/data');
                } else {
                    //setting config untuk library upload
                    $config['upload_path']      = './upload/dokumen-pengaduan/';
                    $config['allowed_types']    = 'gif|jpg|png|jpeg';
                    $config['max_size']         = 1000000000;
                    $config['max_width']        = 1024000;
                    $config['max_height']       = 768000;

                    //pemanggilan librabry upload
                    $this->load->library('upload', $config);

                    //jika upload gagal
                    if (!$this->upload->do_upload('foto')) {
                        $data['judul']      = 'Keluhan Masyarakat';
                        $data['aktif']      = 'data';
                        $data['pengaduan']  = $this->M_pengaduan->get_id($id_pengaduan)->row_array();

                        $this->load->view('template/header', $data);

                        $this->load->view('keluhan/edit_keluhan', $data);
                        $this->load->view('template/footer', $data);
                        //jika upload berhasil
                    } else {
                        $foto_lama = $this->input->post('foto_lama');
                        $q = $this->db->query("SELECT * FROM pengaduan WHERE foto_keluhan = '$foto_lama' ")->row()->foto;
                        $f = './upload/dokumen-pengaduan/' . $q;
                        unlink($f);

                        $gambar = $this->upload->data();
                        $file   = $gambar['file_name'];
                        $this->M_pengaduan->edit_proses($id_pengaduan, $file);
                        $this->M_history->log_activity_complaint();
                        redirect('pengaduan/data');
                    }
                }
            }
        }

        public function proses_respon()
        {
            $id_pengaduan = $this->input->post('id_pengaduan');
            $respon = $this->input->post('respon');

            $data = array(
                'respon_petugas'    => $respon
            );

            $where = array(
                'id_pengaduan'   => $id_pengaduan
            );

            $this->M_pengaduan->sql_update($where, $data, 'pengaduan');
            redirect('pengaduan');
        }

        public function update_status($id_pengaduan)
        {
            $admin = $this->session->userdata('userdata_desa');

            $status = $this->M_pengaduan->get_id($id_pengaduan)->row()->status;

            if ($status == 1) {
                $data = array(
                    'status'    => 0,
                    'id_petugas'  => $admin['id_petugas']
                );
            } else {
                $data = array(
                    'status'    => 1,
                    'id_petugas'  => $admin['id_petugas']
                );
            }

            $this->db->where('id_pengaduan', $id_pengaduan);
            $this->db->update('pengaduan', $data);

            redirect('Pengaduan');
        }

        public function hapus_keluhan($id_pengaduan, $foto)
        {
            $path = './upload/dokumen-pengaduan/';
            @unlink($path . $foto);

            $where = array('id_pengaduan' => $id_pengaduan);
            $this->M_pengaduan->delete($where);

            redirect('pengaduan/data');
        }

        public function pdf_pengaduan()
        {
            $this->load->library('dompdf_gen');

            $data['pengaduan'] = $this->M_pengaduan->get_all()->result();

            $this->load->view('report/report_pengaduan_manual', $data);

            date_default_timezone_set('Asia/Jakarta');
            $tanggal    = date('dmy');
            $waktu      = date('Hi');

            $paper_size = 'A4';
            $orientation = 'potrait';
            $html = $this->output->get_output();
            $this->dompdf->set_paper($paper_size, $orientation);

            $this->dompdf->load_html($html);
            $this->dompdf->render();
            $this->dompdf->stream('Report_Pengaduan_' . $tanggal . '' . $waktu . '.pdf', array('Attachment' => 0));
        }
    }
