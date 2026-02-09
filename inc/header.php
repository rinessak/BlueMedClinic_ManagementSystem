<?php
include "functions.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet"/>
    <title>BlueMed Clinic</title>
</head>
<body>
    <header>
        <div class="container">
            <div class="header-content">
                <div class="logo">
                    <a href="index.php">
                        <h3><i class="fa-brands fa-medrt"></i> BlueMed Clinic</h3>
                    </a>
                </div>
                <div class="navbar">
                    <ul class="nav-items">
                        <?php 
                            if(isset($_SESSION['perdoruesi'])){
                                echo '<li class="active"><a href="index.php">Home</a></li>';
                                echo  '<li><a href="sherbimet.php">Services</a></li>';
                                echo  '<li><a href="doktoret.php">Doctors</a></li>';
                                echo  '<li><a href="pacientet.php">Patients</a></li>';
                                echo  '<li><a href="terminet.php">Appointments</a></li>';
                                if($_SESSION['perdoruesi']['roli']==1){
                                    echo "<li><a href='perdoruesit.php'</a>Users</li>";

                            }
                            echo "<li><a id='dalja' href='#'>Log Out</a></li>";
                        
                        }else{
                               echo '<li id="login"><a href="login.php">Log in</a></li>';
                                echo '<li id="sign-up"><a href="signUp.php">Sign up</a></li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </header>