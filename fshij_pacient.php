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
if(isset($_POST['fshij'])){
    fshijPacient($pacientiid);
}
?>

<section class="section-shto-modifiko container">
    <div class="image">
        <img src="images/patient-pic.png" alt="">
    </div>
    <div class="forma">
        <br>
        <br>
        <h1>Forma per fshirjen e Pacienteve</h1>
        <br>
        <form id="pacienti" method="post">
            <div class="inputAndLabels">
                <label for="emri">Emri</label> <br>
                <input disabled type="text" id="emri" name="emri"
                value="<?php if(!empty($emri)) echo $emri;?>">
            </div>
            <div class="inputAndLabels">
                <label for="mbiemri">Mbiemri</label> <br>
                <input disabled type="text" id="mbiemri" name="mbiemri"
                value="<?php if(!empty($mbiemri)) echo $mbiemri;?>">
            </div>
            <div class="inputAndLabels">
                <label for="data_lindjes">Data e lindjes</label> <br>
                <input disabled type="date" id="data_lindjes" name="data_lindjes"
                value="<?php if(!empty($data_lindjes)) echo $data_lindjes;?>">
            </div>
            <div class="inputAndLabels">
                <label for="gjinia">Gjinia</label> <br>
                <input type="text" id="gjinia" name="gjinia" 
                value="<?php if (!empty($gjinia)) echo $gjinia ?>">
            </div>
            <div class="inputAndLabels">
                <label for="email">Email</label> <br>
                <input disabled type="email" id="email" name="email"
                value="<?php if(!empty($email)) echo $email;?>">
            </div>
            <div class="inputAndLabels">
                <label for="telefoni">Telefoni</label> <br>
                <input disabled type="text" id="telefoni" name="telefoni"
                value="<?php if(!empty($telefoni)) echo $telefoni;?>">
            </div>
            <div class="inputAndLabels">
                <label for="bio">Bio</label> <br>
                <input disabled type="text" id="bio" name="bio"
                value="<?php if(!empty($bio)) echo $bio;?>">
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
