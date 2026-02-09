<?php
include "inc/header.php";

if(isset($_GET['pid'])){
    $pacientiid = $_GET['pid'];
    $pacienti = merrPacientId($pacientiid);
    $emri=$pacienti['emri'];
    $mbiemri=$pacienti['mbiemri'];
    $data_lindjes=$pacienti['data_lindjes'];
    $gjinia=$pacienti['gjinia'];
    $email=$pacienti['email'];
    $telefoni=$pacienti['telefoni'];
    $adresa=$pacienti['adresa'];
    $data_regjistrimit=$pacienti['data_regjistrimit'];
    $informata_shtese=$pacienti['informata_shtese'];
}
if(isset($_POST['shtopacient'])){
    shtoPacient($_POST['emri'],$_POST['mbiemri'],$_POST['data_lindjes'],$_POST['gjinia'],$_POST['email'],$_POST['telefoni'],$_POST['adresa'],$_POST['data_regjistrimit'],$_POST['informata_shtese']);
}
if(isset($_POST['modifikopacient'])){
    modifikoPacient($pacientiid,
    $_POST['emri'],
    $_POST['mbiemri'],
    $_POST['data_lindjes'],
    $_POST['gjinia'],
    $_POST['email'],
    $_POST['telefoni'],
    $_POST['adresa'],
    $_POST['data_regjistrimit'],
    $_POST['informata_shtese']);
}
?>

<section class="section-shto-modifiko container">
    <div class="doc-image">
        <img src="images/patients.jpg" alt="">
    </div>
    <div class="forma">
        <br>
        <br>
        <h1>Forma per shtimin/modifikimin e pacienteve</h1>
        <br>
        <form id="pacienti" method="post">
            <div class="inputAndLabels">
                <label for="emri">Emri</label> <br>
                <input type="text" id="emri" name="emri" 
                value="<?php if (!empty($emri)) echo $emri ?>">
            </div>
            <div class="inputAndLabels">
                <label for="mbiemri">Mbiemri</label> <br>
                <input type="text" id="mbiemri" name="mbiemri" 
                value="<?php if (!empty($mbiemri)) echo $mbiemri ?>">
            </div>
            <div class="inputAndLabels">
                <label for="data_lindjes">Data e lindjes</label> <br>
                <input type="date" id="data_lindjes" name="data_lindjes" 
                value="<?php if (!empty($data_lindjes)) echo $data_lindjes ?>">
            </div> 
            <div class="inputAndLabels">
                <label for="gjinia">Gjinia</label> <br>
                <select id="gjinia" name="gjinia">
                <option value="M" <?php if(!empty($gjinia) && $gjinia == "M") echo "selected"; ?>>Male</option>
                <option value="F" <?php if(!empty($gjinia) && $gjinia == "F") echo "selected"; ?>>Female</option>
                </select>
            </div>
            <div class="inputAndLabels">
                <label for="email">Email</label> <br>
                <input type="email" id="email" name="email" 
                value="<?php if (!empty($email)) echo $email ?>">
            </div>
            <div class="inputAndLabels">
                <label for="telefoni">Telefoni</label> <br>
                <input type="text" id="telefoni" name="telefoni" 
                value="<?php if (!empty($telefoni)) echo $telefoni ?>">
            </div>
            <div class="inputAndLabels">
                <label for="adresa">Adresa</label> <br>
                <input type="text" id="adresa" name="adresa" 
                value="<?php if (!empty($adresa)) echo $adresa ?>">
            </div>
            <div class="inputAndLabels">
                <label for="data_regjistrimit">Data e regjistrimit</label> <br>
                <input type="date" id="data_regjistrimit" name="data_regjistrimit" 
                value="<?php echo date('Y-m-d'); ?>">
            </div>           
            <div class="inputAndLabels">
                <label for="informata_shtese">Informata shtese</label> <br>
                <input type="textarea" id="informata_shtese" name="informata_shtese" 
                value="<?php if (!empty($informata_shtese)) echo $informata_shtese ?>">
            </div>
            <div class="inputAndLabels">
                <div class="butonat">
                    <?php
                    if (!isset($_GET['pid'])) {
                        echo "<input id='shtopacient' type='submit'
                            name='shtopacient' class='shtoModifiko' value='Shto Pacient'>";
                    } else {
                        echo "<input id='modifikopacient' type='submit'
                            name='modifikopacient' class='shtoModifiko' value='Modifiko Pacient'>";
                    }
                    ?>
                </div>
            </div>
        </form>
    </div>
</section>

<?php
include "inc/footer.php";

?>