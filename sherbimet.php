<?php
include "inc/header.php";
?>


<section class="list-entity container">
<div class="image">
        <img src="images/laboratori.jpeg" alt="">
    </div>
    <?php
    if(isset($_SESSION['message'])) {
        echo "<div id='message'>" . $_SESSION['message'] . "</div>";
    }
    
    if($_SESSION['perdoruesi']['roli']==1){
    echo '<a href="shto_modifiko_sherbime.php" id="add_entity">+ Shto sherbime</a>';}
    ?>
    <table class="styled-table">
        <thead>
            <tr>
                <?php
            if(isset($_SESSION['perdoruesi'])){
               echo '<th>Sherbimi</th>';
               echo '<th>Pershkrimi</th>';
               if($_SESSION['perdoruesi']['roli']==1){
                echo '<th>Modifiko</th>';
                echo '<th>Fshije</th>';
               }
            }
            ?>
            </tr>
        </thead>
        <tbody>
            <?php
                $sherbimet = merrSherbimet();
                while ($sherbimi = mysqli_fetch_assoc($sherbimet)) {
                    $sherbimiid=$sherbimi['sherbimiid'];
                    echo "<tr>";
                    if(isset($_SESSION['perdoruesi'])){
                        echo "<td>" . $sherbimi['emri'] . "</td>";
                        echo "<td>" . $sherbimi['pershkrimi'] . "</td>";
                        if($_SESSION['perdoruesi']['roli']==1){
                            echo "<td><a href='shto_modifiko_sherbime.php?shid=$sherbimiid'>Edit</a></td>";
                            echo "<td><a href='fshij_sherbim.php?shid=$sherbimiid'>Delete</a></td>";
                        }
                    echo "</tr>";
                }}
            ?>

        </tbody>
    </table>
</section>

<?php
include "inc/footer.php";

?>