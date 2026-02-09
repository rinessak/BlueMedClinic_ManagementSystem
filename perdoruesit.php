<?php include "inc/header.php"; ?>

<section class="list-entity container">
    <div class="image">
        <img src="images/patients.jpg" alt="">
    </div>
    <?php
    if(isset($_SESSION['message'])) {
        echo "<div id='message'>" . $_SESSION['message'] . "</div>";
    }
    ?>
    <a href="shto_modifiko_perdorues.php" id="add_entity">+ Shto perdorues</a>
    <table class="styled-table">
        <thead>
            <tr>
                <th>Emri</th>
                <th>Mbiemri</th>
                <th>Email</th>
                <th>Telefoni</th>
                <th>Numri personal</th>
                <th>Adresa</th>
                <th>Roli</th>
                <th>Fjalekalimi</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $perdoruesit = merrPerdoruesit();
                while ($perdoruesi = mysqli_fetch_assoc($perdoruesit)) {
                    $perdoruesiid=$perdoruesi['perdoruesiid'];
                    echo "<tr>";
                    echo "<td>" . $perdoruesi['emri'] . "</td>";
                    echo "<td>" . $perdoruesi['mbiemri'] . "</td>";
                    echo "<td>" . $perdoruesi['email'] . "</td>";
                    echo "<td>" . $perdoruesi['telefoni'] . "</td>";
                    echo "<td>" . $perdoruesi['nrpersonal'] . "</td>";
                    echo "<td>" . $perdoruesi['adresa'] . "</td>";
                    echo "<td>" . $perdoruesi['roli'] . "</td>";
                    echo "<td>" . $perdoruesi['fjalekalimi'] . "</td>";
                    echo "<td><a href='shto_modifiko_perdorues.php?perid=$perdoruesiid'>Edit</a></td>";
                    echo "<td><a href='fshij_perdorues.php?perid=$perdoruesiid'>Delete</a></td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</section>
<?php include "inc/footer.php"; ?>