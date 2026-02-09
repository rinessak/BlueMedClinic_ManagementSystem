<?php

include "inc/header.php";?>

<?php

if (isset($_GET['shid'])) {
    $sherbimiid=$_GET['shid'];
    $sherbimi=merrSherbimId($sherbimiid);
    $emri=$sherbimi['emri'];
    $pershkrimi=$sherbimi['pershkrimi'];
}
if(isset($_POST['shtosherbim'])){
    shtoSherbim($_POST['emri'],$_POST['pershkrimi']);
}
if(isset($_POST['modifikosherbim'])){
   modifikoSherbim($sherbimiid, $_POST['emri'], $_POST['pershkrimi']);
}
?>

<section class="section-shto-modifiko container">
    <div class="image">
        <img src="images/alergologji.jpg" alt="">
    </div>
    <div class="forma">
        <br>
        <br>
        <h1>Forma per shtimin/modifikimin e Sherbimit</h1>
        <br>
        <form action="#" method="POST">
            <div class="inputAndLabels">
                <label for="emri">Emri</label> <br>
                <input type="text" id="emri" name="emri"
                value="<?php if(!empty($emri)) echo $emri ?>">
            </div>
            <div class="inputAndLabels">
                <label for="pershkrimi">Pershkrimi</label> <br>
                <textarea id="pershkrimi" name="pershkrimi" rows="6">
                    <?php if(!empty($pershkrimi)) echo $pershkrimi ?>
                    
                </textarea>
            </div>
            <div class="inputAndLabels">
                <div class="butonat">
                    <?php
                    if (!isset($_GET['shid'])) {
                        echo "<input id='shtosherbim' type='submit'
                            name='shtosherbim' class='shtoModifiko' value='Shto Sherbim'>";
                    } else {
                        echo "<input id='modifikosherbim' type='submit'
                        name='modifikosherbim' class='shtoModifiko' value='Modifiko Sherbim'>";
                    }
                    ?>
                </div>
            </div>
        </form>
    </div>
</section>

<?php include 'inc/footer.php'; ?>