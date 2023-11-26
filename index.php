<?php

$hasil = 0;
$hasilakhir = 0;
$lulus = "-";
$nama = "-";
$nim = "-";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_GET['action'];

    // Kalkulator
    if ($action == 'kalkulasi') {
        $x = $_POST['angka1'];
        $y = $_POST['angka2'];
        $hasil = $x + $y;
    }

    // Form
    if ($action == 'penilaian') {
        $nama = $_POST['nama'];
        $nim = $_POST['nim'];
        $nilai = $_POST['nilai'];
        $absen = $_POST['absen'];
    if($nilai <= 70 && $absen === 80){
        $lulus = "lulus";
    }else{
        $lulus = "gagal";
    }
    }

    //kalkulasi sesuai user
    if($action == 'kalkulasisesuai'){
        $x = $_POST['angka1'];
        $y = $_POST['angka2'];
        $dropdown = $_POST['dropdown'];

        if ($dropdown == "tambah"){
            $hasilakhir = $x + $y;
        } elseif ($dropdown == "kali"){
            $hasilakhir = $x * $y;
        } elseif ($dropdown == "kurang"){
            $hasilakhir = $x - $y;
        } elseif ($dropdown == "kali"){
            $hasilakhir = $x * $y;
        }else {
            $hasilakhir = $x / $y;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kalkulasi</title>
    <style>
        div{
            width: 800px;
            height: 800px;
            margin: auto;
            border: 5px solid black;
        }
        ul>li{
            list-style-type: none;
        }
        label,input,button{
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div>
    <form action="index.php?action=kalkulasi" method="post">
        <ul>
            <li>
                <label for="angka1">angka 1</label>
                <input type="number" name="angka1" id="angka1" placeholder="masukan angka pertama">
            </li>
            <li>
                <label for="angka2">angka 2</label>
                <input type="number" name="angka2" id="angka2" placeholder="masukan angka kedua">
            </li>
            <li>
                <button type="submit" name="button1">SUBMIT!!!</button>
            </li>
            <h1>
                hasil dari perhitungan diatas adalah <?= $hasil ?>
            </h1>
        </ul>
    </form>
    <span>------------------------------------------------------------------------------------------</span>

    <form action="index.php?action=penilaian" method="post">
    <ul>
            <li>
                <label for="nama">nama</label>
                <input type="text" name="nama" id="nama" placeholder="masukan nama">
            </li>
            <li>
                <label for="nim">nim</label>
                <input type="number" name="nim" id="nim" placeholder="masukan nim">
            </li>
            <li>
                <label for="nilai">nilai</label>
                <input type="number" name="nilai" id="nilai" placeholder="masukan nilai">
            </li>
            <li>
                <label for="absen">absen</label>
                <input type="number" name="absen" id="absen" placeholder="masukan absensi">
            </li>
            <li>
                <button type="submit" name="button2">SUBMIT!!!</button>
            </li>
            <h3>Halo, 
                <?php
                echo $nama;
                ?>
            </h3>
            <h3>no nim kamu adalah  
                <?php
                echo $nim;
                ?>
            </h3>
            <h3>kamu 
                <?php
                echo $lulus;
                ?>
            </h3>
        </ul>
    </form>

    <span>--------------------------------------------------------------------</span>
    <form action="index.php?action=kalkulasisesuai" method="post">
        <ul>
            <li>
                <label for="angka1">angka 1</label>
                <input type="number" name="angka1" id="angka1">
            </li>
            <select name="dropdown" id="dropdown">
                <option value="tambah">+</option>
                <option value="kali">*</option>
                <option value="kurang">-</option>
                <option value="bagi">/</option>
            </select>
            <li>
                <label for="angka2">angka 2</label>
                <input type="number" name="angka2" id="angka2">
            </li>
            <li>
                <button type="submit" name="button3">SUBMIT!!!</button>
            </li>
            <h1>
                hasil dari perhitungan diatas adalah <?= $hasilakhir ?>
            </h1>
        </ul>
    </form>
    </div>
</body>
</html>