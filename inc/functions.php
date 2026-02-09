<?php
session_start();
$dbconn;
dbConnection();
function dbConnection(){
    global $dbconn;
    $dbconn=mysqli_connect('localhost','root','','dbbluemedclinic');
    if(!$dbconn){
        die("Deshtoi lidhja me DB".mysqli_error($dbconn));
    }
}

/* Funksioni per Log In  

function login($email, $fjalekalimi) {
    global $dbconn;

    // Kontrolloni nëse ka një përdorues me email-in e dhënë
    $sql = "SELECT * FROM perdoruesit WHERE email='$email' LIMIT 1";
    $res = mysqli_query($dbconn, $sql);

    if ($res && mysqli_num_rows($res) == 1) {
        $perdoruesiData = mysqli_fetch_assoc($res);
        
        // Kontrollo nëse fjalëkalimi është i saktë
        if ($perdoruesiData['fjalekalimi'] == $fjalekalimi) {
            $perdoruesi = array(
                'perdoruesiid' => $perdoruesiData['perdoruesiid'],
                'emrimbiemri' => $perdoruesiData['emri'] . " " . $perdoruesiData['mbiemri']
            );
            $_SESSION['perdoruesi'] = $perdoruesi;
            header("Location: index.php");
            exit();
        } else {
            echo "Email-i ose fjalekalimi gabim.";
        }
    } else {
        echo "Nuk ka përdorues me këto informacione.";
    }
}*/
function login($email,$fjalekalimi){
    global $dbconn;
    $sql = "SELECT perdoruesiid, emri, mbiemri, roli FROM perdoruesit WHERE email='$email' AND fjalekalimi='$fjalekalimi'";
    $res=mysqli_query($dbconn,$sql);
    if(mysqli_num_rows($res)==1){
        $perdoruesiData=mysqli_fetch_assoc($res);
        $perdoruesi=array();
        $perdoruesi['perdoruesiid']=$perdoruesiData['perdoruesiid'];
        $perdoruesi['emrimbiemri']=$perdoruesiData['emri'] . " " . $perdoruesiData['mbiemri'];
        $perdoruesi['roli']=$perdoruesiData['roli'];
        $_SESSION['perdoruesi']=$perdoruesi;
        header("Location: index.php");
        print_r($perdoruesiData);
    }else{
        echo "Nuk ka perdorues me keto informata";
    }
}
/*   Funksioni per SignUP (regjistrim)  */
function signUp($emri, $mbiemri, $email, $telefoni, $nrpersonal, $adresa, $fjalekalimi){
    global $dbconn;
    $sql_kontroll = "SELECT * FROM perdoruesit WHERE email='$email'";
    $rez_kontroll = mysqli_query($dbconn, $sql_kontroll);
    if(mysqli_num_rows($rez_kontroll) > 0) {
        $_SESSION['message'] = "Ky email është regjistruar më parë.";
        header("Location: signUp.php");
        exit(); 
    }
    $sql = "INSERT INTO perdoruesit (emri, mbiemri, email, telefoni, nrpersonal, adresa, fjalekalimi) 
            VALUES ('$emri', '$mbiemri', '$email', '$telefoni', '$nrpersonal', '$adresa', '$fjalekalimi')";
    $rez = mysqli_query($dbconn, $sql);
    if($rez){
        $_SESSION['message'] = "Jeni regjistruar me sukses.";
        header("Location: login.php");
    } else {
        die("Deshtoi regjistrimi juaj: " . mysqli_error($dbconn));
    }
}


/*   Funksioni per Log Out */
dbConnection();
if(isset($_GET['argument'])){
    if($_GET['argument']=='dalja'){
        session_destroy();
        echo "index.php" ;
    }else if($_GET['argument']='mesazhi'){
        unset($_SESSION['mesazhi']);
    }
}

/* Funksionet per doktoret */
function merrDoktoret(){
    global $dbconn;
    $sql="SELECT doktoriid, emri, mbiemri, specializimi, email, telefoni, bio FROM doktoret";
    return mysqli_query($dbconn,$sql);
}
function merrDoktorId($doktoriid){
    global $dbconn;
    $sql="SELECT doktoriid, emri, mbiemri, specializimi, email, telefoni, bio FROM doktoret WHERE doktoriid=$doktoriid";
    $res=mysqli_query($dbconn, $sql);
    return mysqli_fetch_assoc($res);
}
function shtoDoktor($emri, $mbiemri, $specializimi, $email, $telefoni, $bio){
    global $dbconn;
    $sql="INSERT INTO doktoret(emri, mbiemri, specializimi, email, telefoni, bio) VALUES";
    $sql.="('$emri', '$mbiemri', '$specializimi', '$email','$telefoni', '$bio')";
    $res=mysqli_query($dbconn, $sql);
    if($res){
        $_SESSION['message']="Doktori u shtua me sukses";
        header("Location: doktoret.php");
    }else{
        die("Deshtoi shtimi i doktorit" . mysqli_error($dbconn));
    }
}

function fshijDoktor($doktoriid){
    global $dbconn;
    $sql="DELETE FROM doktoret WHERE doktoriid=$doktoriid ";
    $res=mysqli_query($dbconn,$sql);
    if($res){
        $_SESSION['message']="Doktori u fshi me sukses";
        header("Location: doktoret.php");
    }else{
        die("Deshtoi fshirja i doktorit" . mysqli_error($dbconn));
    }
}
function modifikoDoktor($doktoriid,$emri,$mbiemri,$specializimi,$email,$telefoni,$bio){
    global $dbconn;
    $sql="UPDATE doktoret SET emri='$emri', mbiemri='$mbiemri', specializimi='$specializimi', email='$email' ,
    telefoni='$telefoni', bio='$bio' WHERE doktoriid='$doktoriid' ";
    $res=mysqli_query($dbconn,$sql);
    if($res){
        $_SESSION['message']="Doktori u modifukua me sukses";
        header("Location: doktoret.php");
    }else{
        die("Deshtoi modifikimi i doktorit" . mysqli_error($dbconn));
    }
}
/*Funksionet per sherbime */
function merrSherbimet(){
    global $dbconn;
    $sql="SELECT sherbimiid, emri, pershkrimi FROM sherbimet";
    return mysqli_query($dbconn,$sql);
}
function merrSherbimId($sherbimiid){
    global $dbconn;
    $sql="SELECT emri, pershkrimi FROM sherbimet  WHERE sherbimiid=$sherbimiid";
    $res=mysqli_query($dbconn,$sql);
    return mysqli_fetch_assoc($res);
}
function shtoSherbim( $emri, $pershkrimi){
    global $dbconn;
    $sql="INSERT INTO sherbimet (emri, pershkrimi) VALUES('$emri', '$pershkrimi')";
    $res=mysqli_query($dbconn, $sql);
    if($res){
        $_SESSION['message']="Sherbimi u shtua me sukses";
        header("Location: sherbimet.php");
    }else{
        die("Deshtoi shtimi i sherbimit" . mysqli_error($dbconn));
    }
}
function modifikoSherbim($sherbimiid, $emri, $pershkrimi){
    global $dbconn;
    $sql="UPDATE sherbimet SET emri='$emri', pershkrimi='$pershkrimi' WHERE sherbimiid='$sherbimiid'";
    $res=mysqli_query($dbconn,$sql);
    if($res){
        $_SESSION['message']="Sherbimi u modifikua me sukses";
        header("Location: sherbimet.php");
    }else{
        die("Deshtoi modifikimi i sherbimit" . mysqli_error($dbconn));
    }
}
function fshijSherbim($sherbimiid){
    global $dbconn;
    $sql="DELETE FROM sherbimet WHERE sherbimiid=$sherbimiid ";
    $res=mysqli_query($dbconn,$sql);
    if($res){
        $_SESSION['message']="Sherbimi u fshi me sukses";
        header("Location: sherbimet.php");
    }else{
        die("Deshtoi fshirja e sherbimit" . mysqli_error($dbconn));
    }
}
/**Funksionet per terminet */
function merrTerminet(){
    global $dbconn;
    $sql="SELECT t.terminiid, CONCAT(p.emri,' ',p.mbiemri) pacienti, CONCAT(d.emri,' ',d.mbiemri) doktori, 
    CONCAT(per.emri,' ',per.mbiemri) perdoruesi, t.data_koha_terminit, t.statusi, t.komente, 
    sh.emri sherbimi FROM pacientet p INNER JOIN terminet t ON p.pacientiid=t.pacientiid 
    INNER JOIN doktoret d ON t.doktoriid=d.doktoriid INNER JOIN sherbimet sh ON t.sherbimiid=sh.sherbimiid 
    INNER JOIN perdoruesit per ON t.perdoruesiid=per.perdoruesiid
    ORDER BY t.terminiid DESC";
    return mysqli_query($dbconn,$sql);
}
function merrTerminId($terminiid){
    global $dbconn;
    $sql="SELECT t.terminiid, p.pacientiid, d.doktoriid,per.perdoruesiid, sh.sherbimiid, CONCAT(p.emri,' ',p.mbiemri) pacienti, 
    CONCAT(d.emri,' ',d.mbiemri) doktori, CONCAT(per.emri,' ',per.mbiemri) perdoruesi,sh.emri sherbimi, t.data_koha_terminit, t.statusi, 
    t.komente FROM terminet t INNER JOIN pacientet p ON t.pacientiid=p.pacientiid 
    INNER JOIN doktoret d ON t.doktoriid=d.doktoriid INNER JOIN perdoruesit per ON t.perdoruesiid=per.perdoruesiid 
    INNER JOIN sherbimet sh ON t.sherbimiid=sh.sherbimiid WHERE terminiid=$terminiid";
    $termini=mysqli_query($dbconn, $sql);
    return mysqli_fetch_assoc($termini);
}
function shtoTermin($pacientiid, $doktoriid, $perdoruesiid, $sherbimiid, $data_koha_terminit, $statusi, $komente) {
    global $dbconn;

    $sql = "INSERT INTO terminet (pacientiid, doktoriid, perdoruesiid, sherbimiid, data_koha_terminit, statusi, komente) 
    VALUES ('$pacientiid', '$doktoriid', '$perdoruesiid', '$sherbimiid', '$data_koha_terminit', '$statusi', '$komente')
    WHERE WEEKDAY(data_koha_terminit) BETWEEN 0 AND 5 AND TIME_FORMAT(data_koha_terminit, '%h:%i %p') BETWEEN '08:00 AM' AND '08:30 PM'";
    
    $res = mysqli_query($dbconn, $sql);

    if($res) {
        $_SESSION['message'] = "Termini u shtua me sukses";
        header("Location: terminet.php"); 
    }else {
        die("Deshtoi shtimi i terminit: " . mysqli_error($dbconn)); 
    }
}

function modifikoTermin($terminiid, $pacientiid, $doktoriid,$perdoruesiid, $sherbimiid, $data_koha_terminit, $statusi,$komente){
    global $dbconn;
    $sql="UPDATE terminet SET pacientiid='$pacientiid', doktoriid='$doktoriid', perdoruesiid='$perdoruesiid',sherbimiid='$sherbimiid', data_koha_terminit='$data_koha_terminit', statusi='$statusi', komente='$komente' 
    WHERE terminiid=$terminiid";
    $res=mysqli_query($dbconn,$sql);
    if($res){
        $_SESSION['message']="Termini u modifikua me sukses";
        header("Location: terminet.php");
    }else{
        die("Deshtoi modifikimi i terminit" . mysqli_error($dbconn));
    }
}
function fshijTermin($terminiid){
    global $dbconn;
    $sql="DELETE FROM terminet WHERE terminiid=$terminiid ";
    $res=mysqli_query($dbconn,$sql);
    if($res){
        $_SESSION['message']="Termini u fshi me sukses";
        header("Location: terminet.php");
    }else{
        die("Deshtoi fshirja e terminit" . mysqli_error($dbconn));
    }
}


/* Funksionet per pacient*/
function merrPacientet(){
    global $dbconn;
    $sql="SELECT * FROM pacientet";
    return mysqli_query($dbconn,$sql);
}
function merrPacientId($pacientiid){
    global $dbconn;
    $sql="SELECT * FROM pacientet WHERE pacientiid=$pacientiid";
    $res=mysqli_query($dbconn, $sql);
    return mysqli_fetch_assoc($res);
}
function shtoPacient($emri, $mbiemri, $data_lindjes, $gjinia,$email, $telefoni, $adresa, $data_regjistrimit, $informata_shtese){
    global $dbconn;
    $sql="INSERT INTO pacientet(emri, mbiemri, data_lindjes, gjinia, email, telefoni, adresa, data_regjistrimit, informata_shtese) VALUES";
    $sql.="('$emri',' $mbiemri', '$data_lindjes', '$gjinia','$email', '$telefoni', '$adresa', '$data_regjistrimit', '$informata_shtese')";
    $res=mysqli_query($dbconn, $sql);
    if($res){
        $_SESSION['message']="Pacienti u shtua me sukses";
        header("Location: pacientet.php");
    }else{
        die("Deshtoi shtimi i pacientit" . mysqli_error($dbconn));
    }
}

function fshijPacient($pacientiid){
    global $dbconn;
    $sql="DELETE FROM pacientet WHERE pacientiid=$pacientiid";
    $res=mysqli_query($dbconn,$sql);
    if($res){
        $_SESSION['message']="Pacienti u fshi me sukses";
        header("Location: pacientet.php");
    }else{
        die("Deshtoi fshirja e pacientit" . mysqli_error($dbconn));
    }
}
function modifikoPacient($pacientiid,$emri, $mbiemri, $data_lindjes, $gjinia,$email, $telefoni, $adresa, $data_regjistrimit, $informata_shtese){
    global $dbconn;
    $sql="UPDATE pacientet SET emri='$emri', mbiemri='$mbiemri', data_lindjes='$data_lindjes', gjinia='$gjinia',email='$email',telefoni='$telefoni', 
    adresa='$adresa', data_regjistrimit='$data_regjistrimit', informata_shtese='$informata_shtese' 
    WHERE pacientiid=$pacientiid";
    $res=mysqli_query($dbconn,$sql);
    if($res){
        $_SESSION['message']="Pacienti u modifikua me sukses";
        header("Location: pacientet.php");
    }else{
        die("Deshtoi modifikimi i pacientit" . mysqli_error($dbconn));
    }
}

/* Funksionet per perdorues*/
function merrPerdoruesit(){
    global $dbconn;
    $sql="SELECT * FROM perdoruesit";
    return mysqli_query($dbconn, $sql);
}
function merrPerdoruesId($perdoruesiid){
    global $dbconn;
    $sql="SELECT * FROM perdoruesit WHERE perdoruesiid=$perdoruesiid";
    $res=mysqli_query($dbconn, $sql);
    return mysqli_fetch_assoc($res);
}
function shtoPerdorues($emri, $mbiemri, $email, $telefoni, $nrpersonal, $adresa, $roli, $fjalekalimi){
    global $dbconn;
    $sql="INSERT INTO perdoruesit(emri, mbiemri, email, telefoni, nrpersonal, adresa, roli, fjalekalimi) 
    VALUES('$emri', '$mbiemri', '$email', '$telefoni', '$nrpersonal', '$adresa', '$roli', '$fjalekalimi')";
    $res=mysqli_query($dbconn, $sql);
    if($res){
        $_SESSION['message']="Perdoruesi u shtua me sukses";
        header("Location: perdoruesit.php");
    }else{
        die("Deshtoi shtimi i perdoruesit" . mysqli_error($dbconn));
    }
}
function modifikoPerdorues($perdoruesiid, $emri, $mbiemri, $email,$telefoni, $nrpersonal, $adresa, $roli, $fjalekalimi){
    global $dbconn;
    $sql="UPDATE perdoruesit SET emri='$emri', mbiemri='$mbiemri', email='$email', 
    telefoni='$telefoni', nrpersonal='$nrpersonal', adresa='$adresa', roli=$roli , 
    fjalekalimi='$fjalekalimi'
    WHERE perdoruesiid=$perdoruesiid";
    $res=mysqli_query($dbconn, $sql);
    if($res){
        $_SESSION['message']="Perdoruesi u modifikua me sukses";
        header("Location: perdoruesit.php");  
    }else{
        die("Deshtoi modifikimi i perdoruesit" . mysqli_error($dbconn));
    }
}

function fshijPerdorues($perdoruesiid){
    global $dbconn;
    $sql="DELETE FROM perdoruesit WHERE perdoruesiid=$perdoruesiid";
    $res=mysqli_query($dbconn, $sql);
    if($res){
        $_SESSION['message']='Perdoruesi u fshi me sukses';
        header("Location: perdoruesit.php");
    }else{
        die("Deshtoi fshirja e perdoruesit" . mysqli_error($dbconn));
    }
}
?>