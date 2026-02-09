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
    <a href="shto_modifiko_pacient.php" id="add_entity">+ Shto pacient</a>
    <table class="styled-table">
        <thead>
            <tr>
                <th>Emri</th>
                <th>Mbiemri</th>
                <th>Data e lindjes</th>
                <th>Gjinia</th>
                <th>Email</th>
                <th>Telefoni</th>
                <th>Adresa</th>
                <th>Data e regjistrimit</th>
                <th>Te dhena shtese</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $pacientet = merrPacientet();
                while ($pacienti = mysqli_fetch_assoc($pacientet)) {
                    $pacientiid=$pacienti['pacientiid'];
                    echo "<tr>";
                    echo "<td>" . $pacienti['emri'] . "</td>";
                    echo "<td>" . $pacienti['mbiemri'] . "</td>";
                    echo "<td>" . $pacienti['data_lindjes'] . "</td>";
                    echo "<td>";
                    if ($pacienti['gjinia'] == 'F') {
                        echo "Female";
                    } else {
                        echo "Male";
                    }
                    echo "</td>";     
                    echo "<td>" . $pacienti['email'] . "</td>";
                    echo "<td>" . $pacienti['telefoni'] . "</td>";
                    echo "<td>" . $pacienti['adresa'] . "</td>";
                    echo "<td>" . $pacienti['data_regjistrimit'] . "</td>";
                    echo "<td>" . $pacienti['informata_shtese'] . "</td>";
                    echo "<td><a href='shto_modifiko_pacient.php?pid=$pacientiid'>Edit</a></td>";
                    echo "<td><a href='fshij_pacient.php?pid=$pacientiid'>Delete</a></td>";
                    echo "</tr>";
                }
            ?>

        </tbody>
    </table>
</section>




<?php include "inc/footer.php"; ?>