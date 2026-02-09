<?php include "inc/header.php"; ?>


<section class="section-shto-modifiko container">
    <div class="doc-image">
        <img src="images/appointment1.jpg" alt="">
    </div>
    <?php
    // echo $_SESSION['perdoruesi']['perdoruesiid'];
        if(isset($_POST['shtotermin'])){
            //var_dump($_POST);
            shtoTermin(
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
    <div class="forma">
        <br>
        <br>
        <h1>Forma per shtimin e Termineve</h1>
        <br>
        <form id="termini" method="post" action="">
            <div class="inputAndLabels">
                <label for="pacienti">Pacienti</label> <br>
                <select id="pacientiid" name="pacientiid">
                    <option value="0">Pacienti</option>
                    <?php
                        $pacientet=merrPacientet();
                        while ($pacienti = mysqli_fetch_assoc($pacientet)) {
                            $pacientiid=$pacienti['pacientiid'];
                            $emri=$pacienti['emri'];
                            $mbiemri=$pacienti['mbiemri'];
                            echo "<option value='{$pacientiid}'>$emri $mbiemri</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="inputAndLabels">
                <label for="doktori">Doktori</label> <br>
                <select id="doktoriid" name="doktoriid">
                    <option value="0">Zgjedh doktorin</option>
                    <?php
                        $doktoret=merrDoktoret();
                        while ($doktori = mysqli_fetch_assoc($doktoret)) {
                            $doktoriid=$doktori['doktoriid'];
                            $emri=$doktori['emri'];
                            $mbiemri=$doktori['mbiemri'];
                            echo "<option value='{$doktoriid}'>$emri $mbiemri</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="inputAndLabels">
                <label for="perdoruesi">Perdoruesi</label> <br>
                <select id="perdoruesiid" name="perdoruesiid">
                    <option value="0">Perdoruesi</option>
                    <?php
                        $perdoruesit=merrPerdoruesit();
                        while ($perdoruesi = mysqli_fetch_assoc($perdoruesit)) {
                            $perdoruesiid=$perdoruesi['perdoruesiid'];
                            $emri=$perdoruesi['emri'];
                            $mbiemri=$perdoruesi['mbiemri'];
                            echo "<option value='{$perdoruesiid}'>$emri $mbiemri</option>";
                        }
                    ?>
                </select>
            </div>
                <div class="inputAndLabels">
                <label for="sherbimi">Sherbimi</label> <br>
                <select id="sherbimiid" name="sherbimiid">
                    <option value="0">Zgjedh sherbimin</option>
                    <?php
                        $sherbimet=merrSherbimet();
                        while ($sherbimi = mysqli_fetch_assoc($sherbimet)) {
                            $sherbimiid=$sherbimi['sherbimiid'];
                            $emri=$sherbimi['emri'];
                            echo "<option value='{$sherbimiid}'>$emri</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="inputAndLabels">
                <label for="data_koha_terminit">Data dhe Ora</label> <br>
                <input type="datetime-local" id="data_koha_terminit" name="data_koha_terminit">
            </div>
            <div class="inputAndLabels">
                <label for="statusi">Statusi</label> <br>
                <select id="statusi" name="statusi">
                    <option value="0">Canceled</option>
                    <option value="1">Approved</option>
                </select>
            </div>
            <div class="inputAndLabels">
                <label for="komente">Komente</label> <br>
                <textarea id="komente" name="komente" rows="6">
                    <?php if(!empty($komente)) echo $komente ?>
                </textarea>
            </div>
            <div class="inputAndLabels">
                <div class="butonat">
                    <input type="submit" id="shtotermin" name="shtotermin" class="shtoModifiko" value="Shto Termin">
                </div>
        </form>
    </div>
</section>

<?php
include "inc/footer.php";

?>

