<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_history extends CI_Model
{
    public function get_history()
    {
        return $this->db->get('history')->result();
    }

    public function clear_history()
    {
        $this->db->truncate('history');
    }

    public function log_activity_complaint()
    {
        date_default_timezone_set('Asia/Jakarta');

        $user                 = $this->session->userdata('userdata_desa');
        $nik                 = $user['nik'];
        $nama                 = $user['nama'];
        $pengaduan             = $this->input->post('pengaduan');
        $tanggal_rilis         = date('d-m-Y');
        $waktu_ubah            = date('h:i a');

        $data = array(
            'nik'                       => $nik,
            'nama_penduduk'             => $nama,
            'pengaduan_update'          => $pengaduan,
            'tanggal_ubah'              => $tanggal_rilis,
            'waktu_ubah'                => $waktu_ubah
        );

        $this->db->insert('history', $data);
    }
}
