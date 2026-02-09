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

// Debugging 
//echo "perdoruesiid: " . $_POST['perdoruesiid'];  //OSE var_dump($_POST['perdoruesiid']);

if(isset($_POST['modifikotermin'])){
    modifikoTermin(
        $terminiid,
        $_POST['pacientiid'],
        $_POST['doktoriid'],
        $_POST['perdoruesiid'],
        $_POST['sherbimiid'],
        $_POST['data_koha_terminit'],
        $_POST['statusi'],
        $_POST['komente']
    );
}
?>

<?php 

//Debugging
//var_dump($_POST); ?>

<section class="section-shto-modifiko container">
    <div class="doc-image">
        <img src="images/appointment1.jpg" alt="">
    </div>
    <div class="forma">
        <br>
        <br>
        <h1>Forma per modifikimin e termineve</h1>
        <br>
        <form id="termini" method="post" action="">
            <div class="inputAndLabels">
                <label for="pacienti">Pacienti</label> <br>
                <select id="pacientiid" name="pacientiid">
                    <?php
                    $pacientet = merrPacientet();
                    while ($pacienti = mysqli_fetch_assoc($pacientet)) {
                        $selected = ($pacientiid == $pacienti['pacientiid']) ? 'selected' : '';
                        echo "<option value='{$pacienti['pacientiid']}' $selected>{$pacienti['emri']} {$pacienti['mbiemri']}</option>";
                    }
                    ?>
                </select>
            </div>        
            <div class="inputAndLabels">
                <label for="doktori">Doktori</label> <br>
                <select id="doktoriid" name="doktoriid">
                    <?php
                        $doktoret = merrDoktoret();
                        while ($doktori = mysqli_fetch_assoc($doktoret)) {
                            $selected = ($doktoriid == $doktori['doktoriid']) ? 'selected' : '';
                            echo "<option value='{$doktori['doktoriid']}' $selected>{$doktori['emri']} {$doktori['mbiemri']}</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="inputAndLabels">
                <label for="perdoruesi">Perdoruesi</label> <br>
                <select id="perdoruesiid" name="perdoruesiid">
                    <?php
                    $perdoruesit = merrPerdoruesit();
                    while ($perdoruesi = mysqli_fetch_assoc($perdoruesit)) {
                        $selected = ($perdoruesiid == $perdoruesi['perdoruesiid']) ? 'selected' : '';
                        echo "<option value='{$perdoruesi['perdoruesiid']}' $selected>{$perdoruesi['emri']} {$perdoruesi['mbiemri']}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="inputAndLabels">
                <label for="sherbimi">Sherbimi</label> <br>
                <select id="sherbimiid" name="sherbimiid">
                    <?php
                    $sherbimet = merrSherbimet();
                    while ($sherbimi = mysqli_fetch_assoc($sherbimet)) {
                        $selected = ($sherbimiid == $sherbimi['sherbimiid']) ? 'selected' : '';
                        echo "<option value='{$sherbimi['sherbimiid']}' $selected>{$sherbimi['emri']}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="inputAndLabels">
                <label for="data_koha_terminit">Data dhe Ora</label> <br>
                <input type="datetime-local" id="data_koha_terminit" name="data_koha_terminit" 
                value="<?php if (!empty($data_koha_terminit)) echo $data_koha_terminit ?>">
            </div>
            <div class="inputAndLabels">
                <label for="statusi">Statusi</label> <br>
                <select id="statusi" name="statusi">
                    <option value="0" <?php if(!empty($statusi) && $statusi == "0") echo "selected"; ?>>Canceled</option>
                    <option value="1" <?php if(!empty($statusi) && $statusi == "1") echo "selected"; ?>>Approved</option>
                </select>
            </div>
            <div class="inputAndLabels">
                <label for="komente">Komente</label> <br>
                <textarea id="komente" name="komente" rows="6"><?php if 
                (!empty($komente)) echo $komente; ?></textarea>
            </div>
            <div class="inputAndLabels">
                <div class="butonat">
                    <input type="submit" id="modifikotermin" name="modifikotermin" class="shtoModifiko" value="Modifiko Termin">
                </div>
            </div>
        </form>
    </div>
</section>

<?php
include "inc/footer.php";
?>
