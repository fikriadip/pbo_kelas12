<?php
class Warga_sini
{
    // varible global
    var $nama;
    var $alamat;

    // Tahap 1
    public function personAwal()
    {
        echo $nama_lengkap = "Fikri Adi";
        echo "<br>";
        echo $alamat = "Depok";
    }

    // Tahap 2
    public function person()
    {
        echo $nama_lengkap = $this->nama;
        echo "<br>";
        echo $alamat = $this->alamat;
    }

    // Tahap 3
    public function setPerson()
    {
        // Menggunakan variable global
        $this->nama = "Nama 1";
        echo "<br>";
        $this->alamat = "Alamat 1";
    }

    public function person3($nama, $alamat)
    {
        echo $nama_lengkap = $nama;
        echo "<br>";
        echo $alamat = $alamat;
    }
}