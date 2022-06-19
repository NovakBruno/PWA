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
            <a class="logo" href= index.php alt="logo">
                <h1>RP ONLINE</h1>
            </a>
   
        </header>
        <script type="text/javascript" src="mobile.js"></script>

    <div class="form">

        
        <form enctype="multipart/form-data" action="skripta.php" method="POST">
            <div class="form-item">
            <span id="porukaTitle" class="bojaPoruke"></span>
            <label for="title">Naslov vijesti:</label>
            <div class="form-field">
            <input type="text" id="title" name="title" class="form-field-textual">
            </div>
            </div>
            <br>
            <div class="form-item">
            <span id="porukaAbout" class="bojaPoruke"></span>
            <label for="about">Kratki sadržaj vijesti (do 50 znakova):</label>
            <div class="form-field">
            <textarea id="about"  name="about" id="" cols="30" rows="10" class="formfield-textual"></textarea>
            </div>
            </div>
            <br>
            <div class="form-item">
            <span id="porukaContent" class="bojaPoruke"></span>
            <label for="content">Sadržaj vijesti:</label>
            <div class="form-field">
            <textarea id="content" name="content" cols="30" rows="10"
           class="form-field-textual"></textarea>
            </div>
            </div>
            <div class="form-item">
            <span id="porukaSlika" class="bojaPoruke"></span>
            <label for="picture">Slika: </label>
            <div class="form-field">
            <input type="file" accept="image/jpg,image/gif,image/png ,image/jpeg"
           class="input-text" id="picture" name="picture"/>
            </div>
            <br>
            </div>
            <div class="form-item">
            <span id="porukaKategorija" class="bojaPoruke"></span>
            <label for="category">Kategorija vijesti:</label>
            <div class="form-field">
            <select  name="category" id="category" class="form-field-textual">
                <option value="sport">Sport</option>
                <option value="politika">Politika</option>
            </select>
                </div>
                </div>
                <div class="form-item">
                <br><br><br>
                <label>Spremiti u arhivu:
                <div class="form-field">
                <input type="checkbox" id="archive" name="archive">
                </div>
                </label>
                </div>
                <br>
                <div class="form-item">
                <button type="reset" value="Poništi">Poništi</button>
                <button type="submit" id="slanje" value="Prihvati">Prihvati</button>
                </div>
        </form>

      

</div>
<script type="text/javascript">
 document.getElementById("slanje").onclick = function(event) {

 var slanjeForme = true;


 var poljeTitle = document.getElementById("title");
 var title = document.getElementById("title").value;

 if (title.length < 5 || title.length > 100) 
 {
 slanjeForme = false;

 poljeTitle.style.border="1px dashed red";
 document.getElementById("porukaTitle").innerHTML="Naslov vjesti mora imati između 5 i 100 znakova!<br>";

 } 
 
 else 
 
 {
 poljeTitle.style.border="1px solid green";
 document.getElementById("porukaTitle").innerHTML="";
 }

 // Kratki sadržaj (10-100 znakova)
 var poljeAbout = document.getElementById("about");
 var about = document.getElementById("about").value;
 if (about.length < 10 || about.length > 500) 
 {
 slanjeForme = false;
 poljeAbout.style.border="1px dashed red";
 document.getElementById("porukaAbout").innerHTML="Kratki sadržaj mora imati između 10 i 500 znakova!<br>";

 } 
 
 else 

 {
 poljeAbout.style.border="1px solid green";
 document.getElementById("porukaAbout").innerHTML="";
 }

 
 var poljeContent = document.getElementById("content");
 var content = document.getElementById("content").value;
 if (content.length == 0) 
 
 {
 slanjeForme = false;
 poljeContent.style.border="1px dashed red";
 document.getElementById("porukaContent").innerHTML="Sadržaj mora biti unesen!<br>";

 } 
 
 else 
 
 {
 poljeContent.style.border="1px solid green";
 document.getElementById("porukaContent").innerHTML="";
 }

 var poljeSlika = document.getElementById("picture");
 var pphoto = document.getElementById("picture").value;

 if (pphoto.length == 0) 
 {

 slanjeForme = false;
 poljeSlika.style.border="1px dashed red";
 document.getElementById("porukaSlika").innerHTML="Slika mora biti unesena!<br>";

 } 
 
 else 
 {
 poljeSlika.style.border="1px solid green";
 document.getElementById("porukaSlika").innerHTML="";
 }

 if (slanjeForme != true) 
 {
 event.preventDefault();
 }

 };

 </script>

    <footer>
        <P>Ovo je footer</P>
    </footer>
</body>