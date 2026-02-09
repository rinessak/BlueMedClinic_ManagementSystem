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
if(isset($_POST['fshij'])){
    fshijPerdorues($perdoruesiid);
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
                <input disabled type="text" id="emri" name="emri" 
                value="<?php if (!empty($emri)) echo $emri ?>">
            </div>
            <div class="inputAndLabels">
                <label for="mbiemri">Mbiemri</label> <br>
                <input disabled type="text" id="mbiemri" name="mbiemri" 
                value="<?php if (!empty($mbiemri)) echo $mbiemri ?>">
            </div>
            <div class="inputAndLabels">
                <label for="email">Email</label> <br>
                <input disabled type="email" id="email" name="email" 
                value="<?php if (!empty($email)) echo $email ?>">
            </div>
            <div class="inputAndLabels">
                <label for="telefoni">Telefoni</label> <br>
                <input disabled type="text" id="telefoni" name="telefoni" 
                value="<?php if (!empty($telefoni)) echo $telefoni ?>">
            </div>
            <div class="inputAndLabels">
                <label for="nrpersonal">Numri personal</label> <br>
                <input disabled type="text" id="nrpersonal" name="nrpersonal" 
                value="<?php if (!empty($nrpersonal)) echo $nrpersonal ?>">
            </div>

            <div class="inputAndLabels">
                <label for="adresa">Adresa</label> <br>
                <input disabled type="text" id="adresa" name="adresa" 
                value="<?php if (!empty($adresa)) echo $adresa ?>">
            </div>
            <div class="inputAndLabels">
                <label for="roli">Roli</label> <br>
                <input disabled type="text" id="roli" name="roli" 
                value="<?php echo ($roli == 0) ? 'Perdorues' : 'Admin'; ?>">
            </div>          
            <div class="inputAndLabels">
                <label for="fjalekalimi">Fjalekalimi</label> <br>
                <input disabled type="text" id="fjalekalimi" name="fjalekalimi" 
                value="<?php if (!empty($fjalekalimi)) echo $fjalekalimi ?>">
            </div>
            <div class="inputAndLabels">
                <div class="butonat">
                    <input type="submit" id="fshij" name="fshij" class="shtoModifiko" value="Fshij">
                </div>
            </div>
        </form>
    </div>
</section>

<?php
include "inc/footer.php";

?>
