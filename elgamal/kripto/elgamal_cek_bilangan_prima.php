<?php include "../fungsi/fungsi_elgamal.php";
include("../assets/header.php");?>
<h2 align="center">ALGORITMA ELGAMAL</h2>
<p align="center">Website by HARIS ABDUL AFIF</p>
<div class="tab">
    <button class="tablinks" onclick="openCity(event, 'Enkripsi')">Enkripsi</button>
    <button class="tablinks" onclick="openCity(event, 'Dekripsi')">Dekripsi</button>
    <button class="tablinks" onclick="openCity(event, 'Prima')" id="defaultOpen">Cek Bilangan Prima</button>
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
</div>
<div id="Dekripsi" class="tabcontent">
    <h3 align="center">Proses Dekripsi</h3><hr>
    <p><b>Kunci privat (x, p) :</b></p> 
    <form method="post" action="elgamal_dekripsi.php">
    <input type="number" placeholder="x" name="x" required>
    <input type="number" placeholder="p" name="p" required>
    <p><b>Pesan :</b></p> 
    <textarea rows="4" cols="50" placeholder="Chiperteks" name="teks" id="teks" required></textarea>
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
    <?php
    if (isset($_POST['prima'])){
        if($prima) {
            echo '
                <p>Angka <b>'.$n.'</b> adalah <b>bilangan prima</b>.</p>';
        } else {
            echo '
                <p>Angka <b>'.$n.'</b> adalah <b> bukan bilangan prima</b>.</p>';
        }
    }
    ?>
</div>
<?php include("../assets/footer.php");?>
