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
                    <li><a href="kategorija.php">Sport</a></li>
                    <li><a href="kategorija.php">Politik</a></li>
                    <li><a href="administracija.php">Administracija</a></li>
                </ul>
            </nav>

        </header>

    

<?php
include 'connect.php';
define('UPLPATH', 'images/');

$query = "SELECT*FROM vijesti";

$result = mysqli_query($dbc, $query);

while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) 

{
echo"<div class='konte2'>";
 echo '<form class="konte" enctype="multipart/form-data" action="" method="POST">
 <div class="form-item">
 <label for="title">Naslov vjesti:</label>
 <div class="form-field">
 <input type="text" name="title" class="form-field-textual"
value="'.$row['naslov'].'">
 </div>
 </div>
 <div class="form-item">
 <label for="about">Kratki sadržaj vijesti (do 50
znakova):</label>
 <div class="form-field">
 <textarea name="about" id="" cols="30" rows="10" class="formfield-textual">'.$row['sazetak'].'</textarea>
 </div>
 </div>
 <div class="form-item">
 <label for="content">Sadržaj vijesti:</label>
 <div class="form-field">
 <textarea name="content" id="" cols="30" rows="10" class="formfield-textual">'.$row['tekst'].'</textarea>
 </div>
 </div>
 <div class="form-item">
 <label for="picture">Slika:</label>
 <div class="form-field">
 <input type="file" class="input-text" id="picture"
 value="'.$row['slika'].'" name="picture"/> <br><img src="' . UPLPATH .$row['slika'] . '" width=100px>
 </div>
  </div>
  <div class="form-item">
  <label for="category">Kategorija vijesti:</label>
  <div class="form-field">
  <select name="category" id="" class="form-field-textual"
 value="'.$row['kategorija'].'">
  <option value="sport">Sport</option>
  <option value="kultura">Kultura</option>
  </select>
  </div>
  </div>
  <div class="form-item">
  <label>Spremiti u arhivu:
  <div class="form-field">';

  if($row['arhiva'] == 0) {
  echo '<input type="checkbox" name="archive" id="archive"/>
 Arhiviraj?';

  } else {
  echo '<input type="checkbox" name="archive" id="archive"
 checked/> Arhiviraj?';
  }
  echo '</div>
  </label>
  </div>
  </div>';
  echo"<div class='konte2'>";
  echo'<div class="form-item">
  <input type="hidden" name="id" class="form-field-textual"
 value="'.$row['id'].'">
  <button type="reset" value="Poništi">Poništi</button>
  <button type="submit" name="update" value="Prihvati">
 Izmjeni</button>
  <button type="submit" name="delete" value="Izbriši">
 Izbriši</button>
  </div>
</form>
  </div> 
  </div>
  </div>';
  
}

  if(isset($_POST['delete']))
{
    $id=$_POST['id'];
    $query = "DELETE FROM vijesti WHERE id=$id ";
    $result = mysqli_query($dbc, $query);
}

if(isset($_POST['update']))

{
$picture = $_FILES['picture']['name'];
$title=$_POST['title'];
$about=$_POST['about'];
$content=$_POST['content'];
$category=$_POST['category'];

if(isset($_POST['archive'])){
 $archive=1;
}else{
 $archive=0;
}

$target = 'images/'.$picture;
move_uploaded_file($_FILES["picture"]["tmp_name"], $target);
$id=$_POST['id'];
$query = "UPDATE vijesti SET naslov='$title', sazetak='$about', tekst='$content',
slika='$picture', kategorija='$category', arhiva='$archive' WHERE id=$id ";
$result = mysqli_query($dbc, $query);
}


 ?>

</body>

</html>

