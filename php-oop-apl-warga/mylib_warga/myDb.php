<?php
Class DbWarga {
    public function __construct()
    {
        $dbhost = "localhost";
        $dbname = "db_pbo12_php_warga";
        $dbusername = "root";
        $dbpassword = "";
        // Metode PDO
        $this->db = new PDO("mysql:host={$dbhost}; dbname={$dbname}", $dbusername, $dbpassword);  
    }

    public function show()
    {
        $query = $this->db->prepare("SELECT * FROM data_warga");
        $query->execute();
        $data_warga = $query->fetchAll();
        return $data_warga;
    }

    public function add_data($no_ktp,$nama_lengkap,$alamat_lengkap,$no_hp,$tempat_lahir)
    {
        $data_warga = $this->db->prepare("INSERT INTO data_warga (no_ktp, nama_lengkap, alamat_lengkap, no_hp, tempat_lahir) VALUES (?, ?, ?, ?, ?)");

        $data_warga->bindParam(1, $no_ktp);
        $data_warga->bindParam(2, $nama_lengkap);
        $data_warga->bindParam(3, $alamat_lengkap);
        $data_warga->bindParam(4, $no_hp);
        $data_warga->bindParam(5, $tempat_lahir);
        
        $data_warga->execute();
        return $data_warga->rowCount();
    }

    public function get_by_id($id_warga){
        $query = $this->db->prepare("SELECT * FROM data_warga WHERE id=?");
        $query->bindParam(1, $id_warga);
        $query->execute();
        return $query->fetch();
    }

    public function update_data($id,$nomor_ktp,$nama,$alamat,$nomor_hp,$tempatlahir)
    {
        $query = $this->db->prepare("UPDATE data_warga SET no_ktp=?,nama_lengkap=?,alamat_lengkap=?,no_hp=?,tempat_lahir=? WHERE id=?");

        $query->bindParam(1, $nomor_ktp);
        $query->bindParam(2, $nama);
        $query->bindParam(3, $alamat);
        $query->bindParam(4, $nomor_hp);
        $query->bindParam(5, $tempatlahir);
        $query->bindParam(6, $id);
        
        $query->execute();
        return $query->rowCount();
    }

    // public function update($kd_siswa,$nama_siswa,$kelas,$alamat){
    //     $query = $this->db->prepare('UPDATE tb_siswa set nama_siswa=?,kelas=?,alamat=? where kd_siswa=?');
        
    //     $query->bindParam(1, $nama_siswa);
    //     $query->bindParam(2, $kelas);
    //     $query->bindParam(3, $alamat);
    //     $query->bindParam(4, $kd_siswa);
 
    //     $query->execute();
    //     return $query->rowCount();
    // }

    public function delete($id_warga)
    {
        $query = $this->db->prepare("DELETE FROM data_warga WHERE id=?");
 
        $query->bindParam(1, $id_warga);
 
        $query->execute();
        return $query->rowCount();
    }
}