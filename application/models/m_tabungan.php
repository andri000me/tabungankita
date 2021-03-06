<?php

class m_tabungan extends CI_Model{

    function tampil_tabungan(){
   
        $hsl=$this->db->query(" select  tabungan.id_tabungan,
        tabungan.id_siswa,
        tabungan.setoran,
        tabungan.penarikan,
        tabungan.saldo,
        sum(tabungan.penarikan) as jumlah_penarikan,
        sum(tabungan.setoran) as jumlah_setoran,
        
        siswa.id_siswa,
        siswa.nama,
        siswa.jenis_kelamin,
        siswa.alamat,
        siswa.telepon,
        siswa.kelas
          
        from 
        siswa, tabungan
        where
        tabungan.id_siswa = siswa.id_siswa
        group by siswa.nama DESC");
        return $hsl;
    }
   
    function cari_siswa($id){
        $hsl=$this->db->query("SELECT tabungan.id_siswa, tabungan.saldo, siswa.id_siswa,
        siswa.nama,
        siswa.jenis_kelamin,
        siswa.alamat,
        siswa.telepon from tabungan, siswa where tabungan.id_siswa=$id order by tabungan.saldo DESC LIMIT 1");
        return $hsl;
      }

    function detail_siswa(){
        $hsl=$this->db->query("");
        return $hsl;
    }
    function detail_tabungan(){
        $hsl=$this->db->query("select  *
        from 
        tabungan");
        return $hsl;
    }
}
?>