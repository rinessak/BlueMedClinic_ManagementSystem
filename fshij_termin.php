<?php
include "inc/header.php";

if(isset($_GET['tid'])){
    $terminiid = $_GET['tid'];
    $termini = merrTerminId($terminiid);
    $pacientiid = $termini['pacientiid'];
    $doktoriid = $termini['doktoriid'];
    $perdoruesiid = $termini['perdoruesiid'];
    $sherbimiid = $termini['sherbimiid'];
    $data_koha_terminit = $termini['data_koha_terminit'];
    $statusi = $termini['statusi'];
    $komente = $termini['komente'];
}

if(isset($_POST['fshijtermin'])){
    fshijTermin($terminiid);
}

$pacient = merrPacientId($pacientiid);
$pacienti = $pacient['emri'] . ' ' . $pacient['mbiemri'];

$doktor = merrDoktorId($doktoriid);
$doktori = $doktor['emri'] . ' ' . $doktor['mbiemri'];

$perdoruesi = merrPerdoruesId($perdoruesiid);
$emri = $perdoruesi['emri'] . ' ' . $perdoruesi['mbiemri'];

$sherbimi = merrSherbimId($sherbimiid);
$sherbim = $sherbimi['emri'];
?>

<section class="section-shto-modifiko container">
    <div class="doc-image">
        <img src="images/appointment2.jpeg" alt="">
    </div>
    <div class="forma">
        <br>
        <br>
        <h1>Forma per fshirjen e terminit</h1>
        <br>
        <form id="termini" method="post" action="">
            <div class="inputAndLabels">
                <label for="pacienti">Pacienti</label> <br>
                <input type="text" id="pacienti" name="pacienti" value="<?php echo $pacienti; ?>" disabled>
            </div>        
            <div class="inputAndLabels">
                <label for="doktori">Doktori</label> <br>
                <input type="text" id="doktori" name="doktori" value="<?php echo $doktori; ?>" disabled>
            </div>
            <div class="inputAndLabels">
                <label for="perdoruesi">Perdoruesi</label> <br>
                <input type="text" id="perdoruesi" name="perdoruesi" value="<?php echo $emri; ?>" disabled>
            </div>
            <div class="inputAndLabels">
                <label for="sherbimi">Sherbimi</label> <br>
                <input type="text" id="sherbimi" name="sherbimi" value="<?php echo $sherbim; ?>" disabled>
            </div>
            <div class="inputAndLabels">
                <label for="data_koha_terminit">Data dhe Ora</label> <br>
                <input disabled type="text" id="data_koha_terminit" name="data_koha_terminit" 
                value="<?php echo $data_koha_terminit; ?>">
            </div>
            <div class="inputAndLabels">
                <label for="statusi">Statusi</label> <br>
                <input disabled type="text" id="statusi" name="statusi" 
                value="<?php echo ($statusi == 0) ? 'Canceled' : 'Approved'; ?>">
            </div>
            <div class="inputAndLabels">
                <label for="komente">Komente</label> <br>
                <textarea id="komente" name="komente" rows="6" disabled><?php echo $komente; ?></textarea>
            </div>
            <div class="inputAndLabels">
                <div class="butonat">
                    <input type="submit" id="fshijtermin" name="fshijtermin" class="fshij" value="Fshij Termin">
                </div>
            </div>
        </form>
    </div>
</section>

<?php
include "inc/footer.php";
?>
