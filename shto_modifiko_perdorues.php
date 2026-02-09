<?php
include "inc/header.php";

if(isset($_GET['perid'])){
    $perdoruesiid = $_GET['perid'];
    $perdoruesi = merrPerdoruesId($perdoruesiid);
    $emri=$perdoruesi['emri'];
    $mbiemri=$perdoruesi['mbiemri'];
    $email=$perdoruesi['email'];
    $telefoni=$perdoruesi['telefoni'];
    $nrpersonal=$perdoruesi['nrpersonal'];
    $adresa=$perdoruesi['adresa'];
    $roli=$perdoruesi['roli'];
    $fjalekalimi=$perdoruesi['fjalekalimi'];
}
if(isset($_POST['shtoperdorues'])){
    shtoPerdorues($_POST['emri'],
    $_POST['mbiemri'],
    $_POST['email'],
    $_POST['telefoni'],
    $_POST['nrpersonal'],
    $_POST['adresa'],
    $_POST['roli'],
    $_POST['fjalekalimi']);
}
if(isset($_POST['modifikoperdorues'])){
    modifikoPerdorues($perdoruesiid,
    $_POST['emri'],
    $_POST['mbiemri'],
    $_POST['email'],
    $_POST['telefoni'],
    $_POST['nrpersonal'],
    $_POST['adresa'],
    $_POST['roli'],
    $_POST['fjalekalimi']);
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
        <form id="perdoru$perdoruesi" method="post">
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
                <label for="nrpersonal">Numri personal</label> <br>
                <input type="text" id="nrpersonal" name="nrpersonal" 
                value="<?php if (!empty($nrpersonal)) echo $nrpersonal ?>">
            </div>

            <div class="inputAndLabels">
                <label for="adresa">Adresa</label> <br>
                <input type="text" id="adresa" name="adresa" 
                value="<?php if (!empty($adresa)) echo $adresa ?>">
            </div>
            <div class="inputAndLabels">
                <label for="roli">Roli</label> <br>
                <select id="roli" name="roli">
                <option value="0" <?php if(!empty($roli) && $roli == "0") echo "selected"; ?>>Perdorues</option>
                <option value="1" <?php if(!empty($roli) && $roli == "1") echo "selected"; ?>>Admin</option>
                </select>
            </div>          
            <div class="inputAndLabels">
                <label for="fjalekalimi">Fjalekalimi</label> <br>
                <input type="text" id="fjalekalimi" name="fjalekalimi" 
                value="<?php if (!empty($fjalekalimi)) echo $fjalekalimi ?>">
            </div>
            <div class="inputAndLabels">
                <div class="butonat">
                    <?php
                    if (!isset($_GET['perid'])) {
                        echo "<input id='shtoperdorues' type='submit'
                            name='shtoperdorues' class='shtoModifiko' value='Shto Perdorues'>";
                    } else {
                        echo "<input id='modifikoperdorues' type='submit'
                            name='modifikoperdorues' class='shtoModifiko' value='Modifiko Perdorues'>";
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