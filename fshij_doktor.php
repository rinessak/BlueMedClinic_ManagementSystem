<?php
include "inc/header.php";
if(isset($_GET['did'])){
    $doktoriid=$_GET['did'];
    $doktori=merrDoktorId($doktoriid);
    $emri=$doktori['emri'];
    $mbiemri=$doktori['mbiemri'];
    $specializimi=$doktori['specializimi'];
    $email=$doktori['email'];
    $telefoni=$doktori['telefoni'];
    $bio=$doktori['bio'];
}
if(isset($_POST['fshij'])){
    fshijDoktor($doktoriid);
}
?>

<section class="section-shto-modifiko container">
    <div class="image">
        <img src="images/doctor3.jpg" alt="">
    </div>
    <div class="forma">
        <br>
        <br>
        <h1>Forma per fshirjen e Doktoreve</h1>
        <br>
        <form id="doktori" method="post">
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
                <label for="specializimi">Specializimi</label> <br>
                <input disabled type="text" id="specializimi" name="specializimi"
                value="<?php if(!empty($specializimi)) echo $specializimi;?>">
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
