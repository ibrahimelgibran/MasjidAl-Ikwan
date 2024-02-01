<?php
class M_grafik extends CI_Model{
 
    public function get_data_pengeluaran()
{
    $query = $this->db->query("SELECT MONTHNAME(MAX(pengeluaran_tanggal)) as bulan, SUM(pengeluaran_jumlah) as jumlahpengeluaran, YEAR(MAX(pengeluaran_tanggal)) as tahun FROM tbl_pengeluaran GROUP BY YEAR(pengeluaran_tanggal), MONTH(pengeluaran_tanggal) ASC");

    if ($query->num_rows() > 0) {
        foreach ($query->result() as $data) {
            $hasil[] = $data;
        }
        return $hasil;
    } else {
        return array(); // Return an empty array if no results are found
    }
}


    public function get_data_pemasukan()
{
    $this->db->select('MONTHNAME(MAX(pemasukan_tanggal)) AS bulan, SUM(pemasukan_jumlah) AS jumlahpemasukan, YEAR(MAX(pemasukan_tanggal)) AS tahun');
    $this->db->from('tbl_pemasukan');
    $this->db->group_by('YEAR(pemasukan_tanggal), MONTH(pemasukan_tanggal)');
    $this->db->order_by('YEAR(pemasukan_tanggal) ASC, MONTH(pemasukan_tanggal) ASC');

    $query = $this->db->get();

    if ($query->num_rows() > 0) {
        return $query->result();
    } else {
        return array(); // Return an empty array if no results are found
    }
}

 
}