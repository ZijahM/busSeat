<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="destinationstyle.css">


</head>
<body>
  <header>
  <a href="homepage.php"><img src="logo.png" alt="logo" height="50px"></a>
  <nav>
  <ul>
    <li><a href="destination.html">Destinations</a></li>
    <li><a href="login.php">Log in</a></li>
    <li><a href="registration.php">Register</a></li>
    <li><a href="#">Info</a>
      <ul>
      <li><a href="contact.php">Contact</a></li>
      <li><a href="about.html">About</a></li>
  </ul> </li>
</ul>
  </nav>
</header>
<div class="Slideshow">

<div class="Picture fade">
  <img src="Sarajevo.jpg" id="Sarajevo" title="Click on the text for more information about Sarajevo!" style="width:100%">
  <a href="https://www.tripadvisor.com/Tourism-g294450-Sarajevo_Sarajevo_Canton-Vacations.html" target="_blank"><div class="text">SARAJEVO</div></a>
</div>

<div class="Picture fade">
  <img src="Mostar.jpg" id="Mostar" title="Click on the text for more information about Mostar!" style="width:100%">
  <a href="https://www.tripadvisor.com/Tourism-g295388-Mostar_Herzegovina_Neretva_Canton-Vacations.html" target="_blank"><div class="text">MOSTAR</div></a>
</div>

<div class="Picture fade">
  <img src="Zenica.jpg" id="Zenica" title="Click on the text for more information about Zenica!" style="width:100%">
  <a href="https://www.tripadvisor.com/Tourism-g303198-Zenica_Zenica_Doboj_Canton-Vacations.html" target="_blank"><div class="text">ZENICA</div></a>
</div>

<div class="Picture fade">
  <img src="BanjaLuka.jpg" id="Banja Luka" title="Click on the text for more information about Banja Luka!" style="width:100%">
  <a href="https://www.tripadvisor.com/Tourism-g303192-Banja_Luka_Republika_Srpska-Vacations.html" target="_blank"><div class="text">BANJA LUKA</div></a>
</div>

</div>
<br>


<script>
var pIndex = 0;
showSlides();

function showSlides() {
    var i;
    var pictures = document.getElementsByClassName("Picture");
    for (i = 0; i < pictures.length; i++) {
       pictures[i].style.display = "none";  

    }
    pIndex++;
    pictures[pIndex-1].style.display = "block";  
    setTimeout(showSlides, 4000); 
    if(pIndex==pictures.length){
      pIndex=0;
    }
    
}

</script>
<footer>
  &copy 2017-2018 - ZENdrive - All rights reserved <br>
  Design and Development - SSST students, Sarajevo 2017.
</footer>
</body>
</html> 
