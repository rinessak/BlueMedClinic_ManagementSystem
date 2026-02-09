<?php
include "inc/header.php";
if(isset($_GET['shid'])){
    $sherbimiid=$_GET['shid'];
    $sherbimi=merrSherbimId($sherbimiid);
    $emri=$sherbimi['emri'];
    $pershkrimi=$sherbimi['pershkrimi'];
}
if(isset($_POST['fshijsherbim'])){
    fshijSherbim($sherbimiid);
}
?>

<section class="section-shto-modifiko container">
    <div class="image">
        <img src="images/laboratori.jpeg" alt="">
    </div>
    <div class="forma">
        <br>
        <br>
        <h1>Forma per fshirjen e Sherbimeve</h1>
        <br>
        <form id="sherbimi" method="post">
            <div class="inputAndLabels">
                <label for="emri">Emri</label> <br>
                <input disabled type="text" id="emri" name="emri"
                value="<?php if(!empty($emri)) echo $emri;?>">
            </div>
            <div class="inputAndLabels">
                <label for="pershkrimi">Pershkrimi</label> <br>
                <textarea id="pershkrimi" name="pershkrimi" rows="6">
                    <?php if(!empty($pershkrimi)) echo $pershkrimi ?>
                </textarea>
            </div>
            <div class="inputAndLabels">
                <div class="butonat">
                    <input type="submit" id="fshijsherbim" name="fshijsherbim" class="shtoModifiko" value="Fshij">
                </div>
            </div>
        </form>
    </div>
</section>

<?php
include "inc/footer.php";

?>
