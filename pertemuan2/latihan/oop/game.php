<?php
    require_once __DIR__ .  '/Produk.php';
    require_once __DIR__ . '/Komik.php';

    class Game extends Produk {
        public $waktuMain;

        public function __construct($judul, $penulis, $penerbit, $harga, $waktuMain) {
            parent::__construct($judul, $penulis, $penerbit, $harga);
            $this->waktuMain = $waktuMain;
        }

        public function getInfoProduk() {
            $str = "Game: " . parent::getInfoProduk() . " ~ {$this->waktuMain} Jam.";
            return $str;
        }
    }

    $produk1 = new Game("Uncharted", "Neil Druckmann", "Sony Computer", 250000, 50);
    $produk2 = new Komik("Naruto", "Masasi Kishimoto", "Shonen Jump", 30000, 100);

    echo $produk1->getInfoProduk();
    echo "<br>";
    echo $produk2->getInfoProduk();
?>