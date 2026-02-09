<?php include "inc/header.php"; ?>

<section class="list-entity container">
    <div class="image">
        <img src="images/doctor1.png" alt="">
    </div>
    <?php
    if(isset($_SESSION['message'])) {
        echo "<div id='message'>" . $_SESSION['message'] . "</div>";
    }
    ?>
    <?php if($_SESSION['perdoruesi']['roli']==1){

    echo '<a href="shto_modifiko_doktor.php" id="add_entity">+ Shto doktor</a>';}
    ?>
    <table class="styled-table">
        <thead>
            <tr>
                <th>Emri</th>
                <th>Mbiemri</th>
                <th>Specializimi</th>
                <th>Email</th>
                <th>Telefoni</th>
                <th>Bio</th>
                <?php if($_SESSION['perdoruesi']['roli']==1){
                    echo '<th>Edit</th>';
                    echo '<th>Delete</th>';
                }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
                $doktoret = merrDoktoret();
                while ($doktori = mysqli_fetch_assoc($doktoret)) {
                    $doktoriid=$doktori['doktoriid'];
                    echo "<tr>";
                    echo "<td>" . $doktori['emri'] . "</td>";
                    echo "<td>" . $doktori['mbiemri'] . "</td>";
                    echo "<td>" . $doktori['specializimi'] . "</td>";
                    echo "<td>" . $doktori['email'] . "</td>";
                    echo "<td>" . $doktori['telefoni'] . "</td>";
                    echo "<td>" . $doktori['bio'] . "</td>";
                    if($_SESSION['perdoruesi']['roli']==1){
                        echo "<td><a href='shto_modifiko_doktor.php?did=$doktoriid'>Edit</a></td>";
                        echo "<td><a href='fshij_doktor.php?did=$doktoriid'>Delete</a></td>";
                        echo "</tr>";
                    }
                }
            ?>

        </tbody>
    </table>
</section>




<?php include "inc/footer.php"; ?>