<?php

class Rumah {
    public $warna;
    public $jumlahKamar;
    public $jumlahJendela;

    public function __construct($warna, $jumlahKamar, $jumlahJendela){
        $this->warna = $warna;
        $this->jumlahKamar = $jumlahKamar;
        $this->jumlahJendela = $jumlahJendela;
    }

    public function kunciPintu(){
        return "pintu sudah dikunci";
    }
}

$rumahSaya = new Rumah("Biru", 3, 5);
$rumahTetangga = new Rumah("Merah", 4, 5);

echo "warna rumah saya: " . $rumahSaya->warna;
echo "<br>";
echo "Jumulah Kamar di rumah saya: " . $rumahSaya->jumlahKamar;
echo "<br>";
echo "Jumlah jendela di rumah saya: " . $rumahSaya->jumlahJendela;
echo "<br>";
echo $rumahSaya->kunciPintu();
?>