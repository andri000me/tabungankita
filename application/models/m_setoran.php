<?php

class m_setoran extends CI_Model{


    function setor($id_siswa,$setoran){
        $saldo=$this->db->query(" select  penarikan,
        setoran,
        sum(setoran)-sum(penarikan) as satota
        from 
        tabungan
        where
        id_siswa = $id_siswa");
        foreach ($saldo->result() as $row)
        {
            echo $row->satota;
        }
        $hsl=$this->db->query("insert INTO tabungan SET
        id_siswa = $id_siswa,
        setoran = $setoran,
        saldo = $row->satota+$setoran,
        tgl = CURDATE(); 
        ");
        $hsl2=$this->db->query("UPDATE siswa set saldo = $row->satota+$setoran where id_siswa = $id_siswa");
      
        return $hsl;
        return $hsl2;
    }
    
   
}
?>