<?php
include "inc/header.php";

if(isset($_GET['did'])){
    $doktoriid = $_GET['did'];
    $doktori = merrDoktorId($doktoriid);
    $emri=$doktori['emri'];
    $mbiemri=$doktori['mbiemri'];
    $specializimi=$doktori['specializimi'];
    $email=$doktori['email'];
    $telefoni=$doktori['telefoni'];
    $bio=$doktori['bio'];
}
if(isset($_POST['shtodoktor'])){
    shtoDoktor($_POST['emri'],$_POST['mbiemri'],$_POST['specializimi'],$_POST['email'],$_POST['telefoni'],$_POST['bio']);
}
if(isset($_POST['modifikodoktor'])){
    modifikoDoktor($doktoriid,
    $_POST['emri'],$_POST['mbiemri'],
    $_POST['specializimi'],$_POST['email'],
    $_POST['telefoni'],$_POST['bio']);
}
?>

<section class="section-shto-modifiko container">
    <div class="doc-image">
        <img src="images/doctor3.jpg" alt="">
    </div>
    <div class="forma">
        <br>
        <br>
        <h1>Forma per shtimin e Doktoreve</h1>
        <br>
        <form id="doktori" method="post">
            <div class="inputAndLabels">
                <label for="emri">Emri</label> <br>
                <input type="text" id="emri" name="emri" value="<?php if (!empty($emri)) echo $emri ?>">
            </div>
            <div class="inputAndLabels">
                <label for="mbiemri">Mbiemri</label> <br>
                <input type="text" id="mbiemri" name="mbiemri" value="<?php if (!empty($mbiemri)) echo $mbiemri ?>">
            </div>
            <div class="inputAndLabels">
                <label for="specializimi">Specializimi</label> <br>
                <input type="text" id="specializimi" name="specializimi" value="<?php if (!empty($specializimi)) echo $specializimi ?>">
            </div> 
            <div class="inputAndLabels">
                <label for="email">Email</label> <br>
                <input type="email" id="email" name="email" value="<?php if (!empty($email)) echo $email ?>">
            </div>
            <div class="inputAndLabels">
                <label for="telefoni">Telefoni</label> <br>
                <input type="text" id="telefoni" name="telefoni" value="<?php if (!empty($telefoni)) echo $telefoni ?>">
            </div>
            <div class="inputAndLabels">
                <label for="bio">Bio</label> <br>
                <input type="text" id="bio" name="bio" value="<?php if (!empty($bio)) echo $bio ?>">
            </div>
            <div class="inputAndLabels">
                <div class="butonat">
                    <?php
                    if (!isset($_GET['did'])) {
                        echo "<input id='shtodoktor' type='submit'
                            name='shtodoktor' class='shtoModifiko' value='Shto Doktor'>";
                    } else {
                        echo "<input id='modifikodoktor' type='submit'
                            name='modifikodoktor' class='shtoModifiko' value='Modifiko Doktor'>";
                    }
                    ?>
                </div>
        </form>
    </div>
</section>

<?php
include "inc/footer.php";

?>