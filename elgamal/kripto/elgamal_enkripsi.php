<?php include "../fungsi/fungsi_elgamal.php";
include("../assets/header.php");?>
<h2 align="center">ALGORITMA ELGAMAL</h2>
<p align="center">Website by HARIS ABDUL AFIF</p>
<div class="tab">
    <button class="tablinks" onclick="openCity(event, 'Enkripsi')" id="defaultOpen">Enkripsi</button>
    <button class="tablinks" onclick="openCity(event, 'Dekripsi')">Dekripsi</button>
    <button class="tablinks" onclick="openCity(event, 'Prima')">Cek Bilangan Prima</button>
</div>
<div id="Enkripsi" class="tabcontent">
    <h3 align="center">Proses Enkripsi</h3><hr>
    <p><b>Pembangkitan kunci :</b></p> 
    <form method="post" action="elgamal_enkripsi.php">
    <input type="number" min="255" placeholder="p (bilangan prima > 255)" name="p" required>
    <p><b>Pesan :</b></p> 
    <textarea rows="4" cols="50" placeholder="Plainteks" name="teks" id="teks" required required></textarea>
    <button type="submit" class="submit" name="enkripsi" id="enkripsi" value="enkripsi">Enkripsi</button>
    </form>
    <?php if (isset($_POST['enkripsi'])){
        echo '
            <hr><h3 align="center">Hasil Enkripsi</h3><hr>
            <p><b>Pesan plainteks :</b></p>
            <textarea rows="4" cols="50" placeholder="Chiperteks" name="teks" id="teks" disabled>'.$teks.' </textarea>
            <p><b>Kunci yang dibangkitkan :</b></p>
            <p>
            1. Nilai p = <span style="color:blue;">'.$p.'</span><br/>
            1. Nilai g (acak) = <span style="color:blue;">'.$g.'</span><br/>
            2. Nilai x (acak) = <span style="color:blue;">'.$x.'</span><br/>
            3. Nilai k (acak) = <span style="color:blue;">'.$k.'</span><br/>
            4. Nilai y = <span style="color:blue;">'.$y.'</span><br/>
            5. Kunci publik (y, g, p) = (<span style="color:blue;">'.$y.'</span>, <span style="color:blue;">'.$g.'</span>, <span style="color:blue;">'.$p.'</span>)<br/>
            6. Kunci privat (x, p) = (<span style="color:blue;">'.$x.'</span>, <span style="color:blue;">'.$p.'</span>)</p>
            <p><b>Kunci yang digunakan :</b></p>
            <p>Kunci publik (y, g, p) = (<span style="color:blue;">'.$y.'</span>, <span style="color:blue;">'.$g.'</span>, <span style="color:blue;">'.$p.'</span>)</p>
            <p><b>Hasil enkripsi pesan :</b></p> <textarea rows="4" cols="50" placeholder="Chiperteks" name="teks" id="teks" disabled>'.$hasilenkripsi.' </textarea>
            <p style="color:gray;"><i>'.$duration.' detik</i></p>';
    }
    ?>
</div>
<div id="Dekripsi" class="tabcontent">
    <h3 align="center">Proses Dekripsi</h3><hr>
    <p><b>Kunci privat (x, p) :</b></p> 
    <form method="post" action="elgamal_dekripsi.php">
    <input type="number" placeholder="x" name="x" value="<?php if(isset($_POST['enkripsi'])){echo $x;} ?>" required>
    <input type="number" placeholder="p" name="p" value="<?php if(isset($_POST['enkripsi'])){echo $p;} ?>" required>
    <p><b>Pesan :</b></p> 
    <textarea rows="4" cols="50" placeholder="Chiperteks" name="teks" id="teks" required><?php if(isset($_POST['enkripsi'])){echo $hasilenkripsi;} ?></textarea>
    <button type="submit" class="submit" name="dekripsi" id="dekripsi" value="dekripsi">Dekripsi</button>
    </form>
</div>
<div id="Prima" class="tabcontent">
    <h3 align="center">Proses Pengecekan Bilangan Prima</h3><hr>
    <p><b>Angka yang dicek :</b></p> 
    <form method="post" action="elgamal_cek_bilangan_prima.php">
    <input type="number" placeholder="Angka yang dianggap bilangan prima" name="n" required>
    <button type="submit" class="submit" name="prima" id="prima" value="prima">Cek Angka</button>
    </form>
</div>
<?php include("../assets/footer.php");?>
