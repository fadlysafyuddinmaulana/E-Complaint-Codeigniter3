<?php

class M_Invoice extends CI_Model
{
    public function send_invoice()
    {
        date_default_timezone_set('Asia/Jakarta');

        $k_invoice      = random_string('alnum', 15);
        $nama           = $this->input->post('nama');
        $pesan          = $this->input->post('pesan');
        $via            = $this->input->post('via');
        $tanggal        = date('d-m-Y');
        $waktu          = date('h:i a');

        $data = array(
            'k_invoice'     => $k_invoice,
            'nama'          => $nama,
            'pesan'         => $pesan,
            'via'           => $via,
            'tanggal'       => $tanggal,
            'waktu'         => $waktu
        );
        $this->db->insert('invoice', $data);
    }

    public function get_all()
    {
        $q = $this->db->query("SELECT * FROM invoice");
        return $q;
    }

    public function get_idp()
    {
        $q = $this->db->query("SELECT pesan FROM invoice");
        return $q;
    }

    public function get_invoice($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
}
