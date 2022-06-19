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

        <script type="text/javascript" src="mobile.js"></script>



<?php

$id=$_GET['id'];

include 'connect.php';
define('UPLPATH', 'images/');


$query = "SELECT * FROM vijesti WHERE id = '$id' ";
$result = mysqli_query($dbc, $query);

while($row = mysqli_fetch_array($result)) {

    echo '<div class="flexbox-container">
    
    <div class="flexbox-item-1"><h3>';

    echo $row['kategorija'];

    echo '</h3></div>

    </div>';

    echo"<div class='flex'>";
        echo"<div class='box1'>";
        echo "<h3>";
        echo '<a href="clanak.php?id='.$row['id'].'">';
            echo $row['naslov'];
        echo '</a></h3>';

            echo "<p>";
            echo $row['datum'];
            echo "</p>";

            echo "<br>";

            echo '<img class="imgc" src="' . UPLPATH . $row['slika'] . '"';
            echo "<br>";
            echo "<h4>";
            echo $row['sazetak'];
            echo "</h4>";

            echo "<p class='tekst'>";
            echo $row['tekst'];
            echo "</p>";

            echo "<br>";
            echo "<br>";

        echo "</div>";
    echo "</div>";

}

?>

</section>


      
        <footer>
            <P>Ovo je footer</P>
        </footer>

        </div>

    </body>
</html>

