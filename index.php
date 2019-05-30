<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="developer.css">
<link rel="stylesheet" href="slide.css">
<link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32" />
<title>Web-X project</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

/* Create three unequal columns that floats next to each other */
.column {
  float: left;
  padding: 10px;
}

/* Left and right column */
.column.side {
  width: 25%;
}

/* Middle column */
.column.middle {
  width: 50%;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .column.side, .column.middle {
    width: 100%;
  }
}
</style>
</head>
<body class=body>
<?php include('includes/client-header.php');?>
<main>
    <article>
<div class="row">
  <div class="column side">
    <h2>Side</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
  </div>
  
  <div class="column middle">
  <div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 4</div>
  <img src="slide1.jpg" style="width:100%; height:410px">
  <div class="text">Get connect with us for superb experience</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 4</div>
  <img src="slide2.jpg" style="width:100%; height:410px">
  <div class="text">Find developers for your needs</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 4</div>
  <img src="slide3.jpg" style="width:100%; height:410px">
  <div class="text">They will give your better experiences</div>
</div>
<div class="mySlides fade">
  <div class="numbertext">4 / 4</div>
  <img src="slide4.jpg" style="width:100%; height:410px">
  <div class="text">You will realize how better it is</div>
</div>

<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
  <span class="dot" onclick="currentSlide(4)"></span>
</div>

<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 3000); // Change image every 2 seconds
}
</script>
  </div>
  
  <div class="column side">
    <h2>Side</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
  </div>
</div>

</article>
</main> 
<footer>
<p style="margin-top: 3%;">
        WebX | Moratuwa | 2 729 729
    </p>
    
</footer>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>
    
</body>

</html>