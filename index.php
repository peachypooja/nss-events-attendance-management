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
    <title>NSS</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* body {
            background-color: linear-gradient(90deg, #2f3694, #c7c9979c, #f3f2c43f);
             font-family: 'Arial', sans-serif; 
            color: #333; 
        } */
        body {
            /* background: linear-gradient(90deg, #5a4aebe1, #d4d4cdef, #df4d4dea); */
            background: linear-gradient(to right, #2F3694, #60638A, #E8A9AB, #EC1C23);
            /* background: linear-gradient(90deg, #fccfb8,  #f9b0c3, #a190d6, #89CFF1 ); */
            font-family: 'Arial', sans-serif;
            min-height: 100vh;
            margin: 0;
        }
        .container {
            margin: auto;
            margin-top: 10px;
            max-width: 800px;
        }
        .carousel {
            border-radius: 15px;
        }
        .carousel-caption {
            background-color: rgba(0, 0, 0, 0.7);
            border-radius: 15px;
        }
        .carousel-caption h5 {
            color: white;
        }
        .carousel-caption p {
            color: #ffd700; /* Golden text color */
        }
        hr {
            border: 2px solid #333;
            width: 80%;
        }
    </style>




<!-- <link rel="stylesheet" href="style.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <!-- <h1>Hello, world!</h1> -->
    <?php 
    include 'partial/_header.php';
    ?>
    

 
    <div class="container" style="margin: auto;  margin-top: 10px;">
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
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4"
                    aria-label="Slide 5"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="5"
                    aria-label="Slide 6"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="6"
                    aria-label="Slide 7"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <!-- <img src="Image\Blood_donation.jpeg" class="d-block w-100" alt="..." width="600px" height="600px"> -->
                    <img src="Image\kargil.jpeg" class="d-block w-100" alt="Kargil Vijay Diwas" height="500">

                    <div class="carousel-caption">
                        <h5>MAJOR EVENTS</h5>
                        <p>Kargil Vijay Diwas 2022-23</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <!-- <img src="Image\Not me but you.gif" class="d-block w-100" alt="..." width="500px" height="500px"> -->
                    <img src="Image\bg.jpeg" class="d-block w-100" alt="Blood Donation Camp" height="500">

                    <div class="carousel-caption">
                        <h5>Blood Donation Camp</h5>
                        <p>In Association with Apollo Foundation</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <!-- <img src="Image\camp.jpeg" class="d-block w-100" alt="..." width="500px" height="500px"> -->
                    <img src="Image\parade.jpeg" class="d-block w-100" alt="NSS Camp" height="500">

                    <div class="carousel-caption">
                        <h5>Parade</h5>
                        <p>Independence Day</p>
                    </div>      
                </div>
                <div class="carousel-item">
                    <!-- <img src="Image\Not me but you.gif" class="d-block w-100" alt="..." width="500px" height="500px"> -->
                    <img src="Image\group.jpeg" class="d-block w-100" alt="Group" height="500">

                    <div class="carousel-caption">
                        <h5>NSS</h5>
                        <p>2022-2023</p>
                    </div>
                </div>
                
                <div class="carousel-item">
                    <!-- <img src="Image\Not me but you.gif" class="d-block w-100" alt="..." width="500px" height="500px"> -->
                    <img src="Image\visarjan.jpeg" class="d-block w-100" alt="Ganesh Visarjan" height="500">

                    <div class="carousel-caption">
                        <h5>Volunteering</h5>
                        <p>During Ganpati Visarjan</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <!-- <img src="Image/Camp.jpeg" class="d-block w-100" alt="..." width="500px" height="500px"> -->
                    <img src="Image\camp.jpeg" class="d-block w-100" alt="NSS Camp" height="500">

                    <div class="carousel-caption">
                        <h5>NSS Remedial Camp</h5>
                        <p>Group 'D' Pinnacle</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <!-- <img src="Image\Not me but you.gif" class="d-block w-100" alt="..." width="500px" height="500px"> -->
                    <img src="Image\Not me but you.gif" class="d-block w-100" alt="Not me but you" height="500">

                    <div class="carousel-caption">
                        <h5>NSS</h5>
                        <p>Together for a great cause!</p>
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



<hr>


   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</body>

</html>