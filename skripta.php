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
<?php

include 'connect.php';
$picture = $_FILES['picture']['name'];
$title=$_POST['title'];
$about=$_POST['about'];
$content=$_POST['content'];
$category=$_POST['category'];
$date=date('d.m.Y.');

if(isset($_POST['archive'])){
 $archive=1;
}else{
 $archive=0;
}
$target = 'images/' . $picture;

move_uploaded_file($_FILES["picture"]["tmp_name"], $target);

$query = "INSERT INTO vijesti (datum, naslov, sazetak, tekst, slika, kategorija,
arhiva ) VALUES ('$date', '$title', '$about', '$content', '$picture','$category', '$archive')";

$result = mysqli_query($dbc, $query) or die('Error querying databese.');

mysqli_close($dbc);


echo '<div class="flexbox-container">
    
<div class="flexbox-item-1"><h3>';

echo $category;

echo '</h3></div>

</div>';

echo"<div class='flex'>";
    echo"<div class='box1'>";
        echo "<h1>";
            echo $title;
        echo "</h1>";

        echo "<p>";
        echo $date;
        echo "</p>";

        echo "<br>";

        echo "<img class='imgc' src='images/$picture'";
        echo "<br>";
        echo "<h4>";
        echo $about;
        echo "</h4>";

        echo "<p class='tekst'>";
        echo $content;
        echo "</p>";

        echo "<br>";
        echo "<br>";

    echo "</div>";
echo "</div>";

?>
