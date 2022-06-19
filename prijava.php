<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Navbar</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">
    </head>
    <body>
        <header>
            <a class="logo"alt="logo">
                <h1>RP ONLINE</h1>
            </a>
            <nav>
                <ul class="nav__links">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="kategorija.php?id=sport">Sport</a></li>
                    <li><a href="kategorija.php?id=politika">Politik</a></li>
                    <li><a href="prijava.php">Administracija</a></li>
                </ul>
            </nav>

        </header>

<div class="regi">
 <section role="main" >
 <form enctype="multipart/form-data" action="" method="POST">
<div class="form-item">
<label for="content">Korisničko ime:</label>
 <div class="form-field">
 <input type="text" name="username" id="username" class="formfield-textual">
 </div>
 </div>
 <div class="form-item">
 <span id="porukaPass" class="bojaPoruke"></span>
 <label for="pphoto">Lozinka: </label>
 <div class="form-field">
 <input type="password" name="pass" id="pass" class="formfield-textual">
 </div>

 <div class="form-item">
 <button type="submit" name="prijava" value="Prijava" id="slanje">Prijava</button>
 </div>
 </form>

</div>

<?php
if (isset($_POST['prijava'])) {
    define('UPLPATH', 'images/');
    $dbc = mysqli_connect("localhost","root","","korisnik");
    $prijavaImeKorisnika = $_POST['username'];
    $prijavaLozinkaKorisnika = $_POST['pass'];
    $sql = "SELECT korisnicko_ime, lozinka, razina FROM korisnik WHERE korisnicko_ime = ?";
    $stmt = mysqli_stmt_init($dbc);
    if (mysqli_stmt_prepare($stmt, $sql)) {
    mysqli_stmt_bind_param($stmt, 's', $prijavaImeKorisnika);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    }
    mysqli_stmt_bind_result($stmt, $imeKorisnika, $lozinkaKorisnika,
   $levelKorisnika);
    mysqli_stmt_fetch($stmt);
    //Provjera lozinke

    if (password_verify($_POST['pass'], $lozinkaKorisnika) && mysqli_stmt_num_rows($stmt) > 0) 
    {
    $uspjesnaPrijava = true;
    
     // Provjera da li je admin

    if($levelKorisnika == 1) {
    $admin = true;
    }
    else {
    $admin = false;
    }
    //postavljanje session varijabli
    $_SESSION['$username'] = $imeKorisnika;
    $_SESSION['$level'] = $levelKorisnika;
    } else {
    $uspjesnaPrijava = 1;
    }
   
}

if (isset($_POST['prijava'])) {
    $dbc2 = mysqli_connect("localhost","root","","vijesti");
    if ((isset($_SESSION['$username'])) && $_SESSION['$level'] == 1) {
   
            header("location:administracija.php");
        
    }

    else if (isset($_SESSION['$username']) && $_SESSION['$level'] == 0) {
   
    echo '<p>Bok ' . $_SESSION['$username'] . '! Uspješno ste prijavljeni, ali niste administrator.</p>';

    } 
    
    else{
        echo "Nemas profil?";
        echo "<br>";
        echo '<a href="registracija.php">Registriraj se!</a>';
    }
}
    
    ?>
 