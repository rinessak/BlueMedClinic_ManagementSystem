<?php include "inc/header.php" ?>

<section class="list-entity container">
    <div class="image">
        <img src="images/appointment1.jpg" alt="">
    </div>
    <?php
    if(isset($_SESSION['message'])) {
        echo "<div id='message'>" . $_SESSION['message'] . "</div>";
    }
    ?>
    <a href="shto_termin.php" id="add_entity">+ Shto Termine</a>
    <table class="styled-table">
        <thead>
            <tr>
                <th>Pacienti</th>
                <th>Doktori</th>
                <th>Perdoruesi</th>
                <th>Sherbimi</th>
                <th>Data dhe Ora </th>
                <th>Statusi</th>
                <th>Te dhena tjera rreth pacientit</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $terminet = merrTerminet();
                while ($termini = mysqli_fetch_assoc($terminet)) {
                    $terminiid=$termini['terminiid'];
                    echo "<tr>";
                    echo "<td>" . $termini['pacienti'] . "</td>";
                    echo "<td>" . $termini['doktori'] . "</td>";
                    echo "<td>" . $termini['perdoruesi'] . "</td>";
                    echo "<td>" . $termini['sherbimi'] . "</td>";
                    echo "<td>" . $termini['data_koha_terminit'] . "</td>";
                    echo "<td>";
                    if ($termini['statusi'] == 1) {
                        echo "Approved";
                    } else {
                        echo "<span style='color: #c84f4f; font-weight: bold;'>Canceled</span>";
                    }
                    echo "</td>";                   
                    echo "<td>" . $termini['komente'] . "</td>";
                    echo "<td><a href='modifiko_termin.php?tid=$terminiid'>Edit</a></td>";
                    echo "<td><a href='fshij_termin.php?tid=$terminiid'>Delete</a></td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</section>

<?php include "inc/footer.php"; ?>