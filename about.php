<?php


 
include 'partial/_dbconnector.php';
session_start();
$num=0;
$num1=0;

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    $num=$num+1;
}
if(!isset($_SESSION['vol_loggedin']) || $_SESSION['vol_loggedin']!=true){
    $num1=$num1+1;
}

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $loggedin = true;
} else {
    $loggedin = false;
}
if (isset($_SESSION['vol_loggedin']) && $_SESSION['vol_loggedin'] == true) {
    $vol_loggedin = true;
} else {
    $vol_loggedin = false;
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <!-- <script src="https://kit.fontawesome.com/c4254e24a8.js" crossorigin="anonymous"></script> -->
    <style>
      body {
        background: linear-gradient(90deg, #fccfb8,  #f9b0c3, #a190d6, #89CFF1 );
        font-family: 'Arial', sans-serif;
        min-height: 100vh;
        margin: 0;
      }   

      .footer {
          /* display: none; Hide the footer by default */
          background-color: #000;
          color: #000;
          margin-top: 150px;
          width: 100%;
          text-align: center;
          padding: 100px 15%;
          display: flex;
      }

      .footer div{
        text-align: center;
      }

    #footer-placeholder {
        margin-bottom: 60px; /* Adjust the margin to match the height of your footer */
    }
    .custom-text-color{
      color: #F5F5F4;
    }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <!-- <link rel="stylesheet" href="style.css"> -->
    <script src="https://kit.fontawesome.com/539007e620.js" crossorigin="anonymous"></script>
      </head>

<body>
    <!-- <h1>Hello, world!</h1> -->
    <?php 
    include 'partial/_header.php';
    require 'partial/_dbconnector.php';
    ?>


<div class="col-md-6 m-auto p-auto mt-3">
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow p-3 h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-primary-emphasis">NSS Unit(SB-23)</strong>
          <strong class="d-inline-block mb-2 text-success-emphasis">Dr. G.D. Giri</strong>
          <h1 class="mb-0 text-success-emphasis">Principal</h1><br><br>
          <p class="card-text mb-auto text-warning-emphasis">“The rain falls on all the fields but crops grow only those fields that have been tilled, prepared and sowed.’’
           </p>
          </a>
        </div>
        <div class="col-auto d-none d-lg-block">
          <img class="bd-placeholder-img shadow p-3" style="border: 4px solid; border-color:white" width="250" height="250" src="Image\Principal.png" role="img"
            aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
            <title>Placeholder</title>
        </img>
        </div>
      </div>
    </div>

    <div class="col-md-6 m-auto p-auto mt-3">
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow p-3 h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-primary-emphasis">NSS</strong>
          <strong class="d-inline-block mb-2 text-success-emphasis">Mr. Kunal Thakur</strong>
          <h1 class="mb-0 text-success-emphasis">NSS Programme Officer</h1><br><br>
          <p class="card-text mb-auto text-warning-emphasis">"Guiding students through the nuanced world of botany, fostering deep exploration and understanding of plants."</p>
          </a>
        </div>
        <div class="col-auto d-none d-lg-block">
          <img class="bd-placeholder-img shadow p-3" style="border: 4px solid; border-color:white" width="250" height="250" src="Image\kunal1.jpeg" role="img"
            aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
            <title>Placeholder</title>
        </img>
        </div>
      </div>
    </div>

    <div class="row mb-3 m-auto p-auto px-5">
      <div class="col-md-6">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow p-3 h-md-250 position-relative">
          <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-primary-emphasis">NSS</strong>
            <strong class="d-inline-block mb-2 text-success-emphasis">Mr. Vijay Rawool</strong>
            <h2 class="mb-0 text-success-emphasis">Teacher Incharge</h2><br><br>
            <p class="card-text mb-auto text-warning-emphasis">"Learn from life's experiences, fueling your growth, just like AI learns from data."</p>
            </a>
          </div>
          <div class="col-auto d-none d-lg-block">
            <img class="bd-placeholder-img shadow p-3" style="border: 4px solid; border-color:white" width="250" height="250" src="Image\Vijay.jpeg" role="img"
              aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
          </img>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow p-3 h-md-250 position-relative">
          <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-success-emphasis">NSS</strong>
            <strong class="d-inline-block mb-2 text-success-emphasis">Mr. Sudhakar Vishwakarma</strong>
            <h2 class="mb-0 text-success-emphasis">Teacher Incharge</h2><br><br>
            <p class="mb-auto text-warning-emphasis">"Just like in math, sometimes life requires a little subtraction to find the true value."</p>
          </div>
          <div class="col-auto d-none d-lg-block">
            <img class="bd-placeholder-img shadow p-3" style="border: 4px solid; border-color:white" width="250" height="250" src="Image\sudhakar.jpeg" role="img"
              aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
          </img>
          </div>
        </div>
      </div>
    </div>

    <!-- <div class="row mb-3 m-auto p-auto px-5">
      <div class="col-md-6">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow p-3 h-md-250 position-relative">
          <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-primary-emphasis">NSS</strong>
            <strong class="d-inline-block mb-2 text-success-emphasis">Ms. Pooja Yadav</strong>
            <h2 class="mb-0 text-success-emphasis">Leader Representative (2022-23)</h2><br><br>
            <p class="card-text mb-auto text-warning-emphasis">This is a wider card with supporting text below as a natural lead-in to
              additional content.</p>
            </a>
          </div>
          <div class="col-auto d-none d-lg-block">
            <img class="bd-placeholder-img shadow p-3" style="border: 4px solid; border-color:white" width="250" height="250" src="Image/Shradhha.png" role="img"
              aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
          </img>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow p-3 h-md-250 position-relative">
          <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-success-emphasis">NSS</strong>
            <strong class="d-inline-block mb-2 text-success-emphasis">Mr. Ayush Singh</strong>
            <h2 class="mb-0 text-success-emphasis">Leader Representative (2022-23)</h2><br><br>
            <p class="mb-auto text-warning-emphasis">This is a wider card with supporting text below as a natural lead-in to additional
              content.</p>
          </div>
          <div class="col-auto d-none d-lg-block">
            <img class="bd-placeholder-img shadow p-3" style="border: 4px solid; border-color:white" width="250" height="250" src="Image/Divya.png" role="img"
              aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
          </img>
          </div>
        </div>
      </div>
    </div> -->
    <div class="container" style="margin: auto;  margin-top: 10px; max-width: 500px; border: 2px solid #8a77bb; border-radius: 5px;">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3"
                    aria-label="Slide 4"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                  <img src="Image\pooja.jpeg" class="d-block w-100" alt="Pooja Yadav" height="500">
                  <div class="carousel-caption">
                      <h5>Pooja Yadav</h5>
                      <p>Female Volunteer Leader 2022-23</p>
                  </div>
              </div>
              <div class="carousel-item">
                  <img src="Image\jatin.jpeg" class="d-block w-100" alt="Jatin Kanojiya" height="500">
                  <div class="carousel-caption">
                      <h5>Jatin Kanojiya</h5>
                      <p>Male Volunteer Leader 2022-23</p>
                  </div>
              </div>
              <div class="carousel-item">
                  <img src="Image\nitya.jpg" class="d-block w-100" alt="Nitya Singh" height="500">
                  <div class="carousel-caption">
                      <h5>Nitya Singh</h5>
                      <p>Female Volunteer Leader 2023-24</p>
                  </div>      
              </div>
              <div class="carousel-item">
                  <img src="Image\sumit.jpeg" class="d-block w-100" alt="Sumeet Gupta" height="500">
                  <div class="carousel-caption">
                      <h5>Sumit Gupta</h5>
                      <p>Male Volunteer Leader 2023-24</p>
                  </div>
              </div>
          </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    
    <div id="footer-placeholder"></div>

    
      <footer class="footer mt-auto py-3 bg-dark text-light">
          <div class="container">
              <h5>Address:</h5>
              <span class="text-muted custom-text-color">
                  <i class="fas fa-map-marker-alt" style="color: #f39c12;"></i> Zagdu Singh Charitable Trust's, <br> Thakur Shyamnarayan Degree College,<br>
                  Institute Code - 1019, <br> 90 feet Road, <br> Thakur Complex, Kandivali (East),<br> Mumbai-400101. <br>
              </span>
          </div>
          <div class="container">
              <h5>Contact: </h5>
              <p>
              <span class="text-muted custom-text-color">
                  <i class="fas fa-phone" style="color: #82b74b;"></i> Phone: 022-28542917 / 28543540 / 28547707 <br>
                  <i class="fas fa-fax" style="color: #f2969b;"></i> Fax: +022-2854 1993 <br>
                  <i class="fas fa-mobile-alt" style="color: #aec6cf;"></i> Mob: +91-9152191370 <br>
                  <i class="fas fa-envelope" style="color: #f5d994;"></i> Email: tsdc@thakureducation.org
              </span>
              </p>

              <div class="social-icons">
                  <a href="https://www.facebook.com/ZSCTTSDC" target="_blank" style="color: #3b5998;"><i class="fab fa-facebook fa-2x"></i></a>
                  <a href="https://twitter.com/ThakurDegree" target="_blank" style="color: #1da1f2;"><i class="fab fa-twitter fa-2x"></i></a>
                  <a href="https://www.linkedin.com/company/thakur-shyamnarayan-degree-college/" target="_blank" style="color: #0077b5;"><i class="fab fa-linkedin fa-2x"></i></a>
                  <a href="https://www.instagram.com/tsdcmumbai/" target="_blank" style="color: #e4405f;"><i class="fab fa-instagram fa-2x"></i></a>
                  <a href="https://www.youtube.com/@zsctstsdcmumbai" target="_blank" style="color: #ff0000;"><i class="fab fa-youtube fa-2x"></i></a>
              </div>
          </div>
      </footer>

    <script>
      window.addEventListener("scroll", function () {
          var footer = document.getElementById("footer");
          var footerPlaceholder = document.getElementById("footer-placeholder");

          // Show the footer when the page reaches the end
          if (window.innerHeight + window.scrollY >= document.body.offsetHeight) {
              footer.style.display = "block";
              footerPlaceholder.style.marginBottom = "0"; // Remove the margin
          } else {
              footer.style.display = "none";
              footerPlaceholder.style.marginBottom = "60px"; // Adjust the margin
          }
      });
    </script>


            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
                crossorigin="anonymous"></script>
</body>

</html>