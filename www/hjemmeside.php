<?php 
require_once ('../Includes/db.inc.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>hybel</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/aos.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.css">
    <link rel="stylesheet" href="../assets/css/Navbar-Right-Links-icons.css">
    <link rel="stylesheet" href="../assets/css/Projects-Grid-images.css">
    <link rel="stylesheet" href="../assets/css/Simple-Slider-Simple-Slider.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-md py-3" data-aos="fade">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="#"><span class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center me-2 bs-icon"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-house">
                        <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"></path>
                        <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"></path>
                    </svg></span><span>Hybel</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-2"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-2">
                <ul class="navbar-nav ms-auto">
                    <!-- Bruker $_SESSION for å hente ut navnet på den personen som er pålogget-->
                    <li class="nav-item"><a class="nav-link active" href="#"> <?php echo "Velkommen, " . $_SESSION['fnavn'];?> </a></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                </ul>
                <a class="btn btn-secondary ms-md-2" role="button" href="./visEndreInfo/viseInfo.php"> Min profil</a>
                <a class="btn btn-secondary ms-md-2" role="button" href="nyAnnonse.php">Ny annonse</a>
                <a class="btn btn-primary ms-md-2" role="button" href="loggUt.php">Logg ut</a>
            </div>
        </div>
    </nav>
    <div class="container py-4 py-xl-5">
        <div class="row mb-5">
            <div class="col-md-8 col-xl-6 text-center mx-auto">
    <!-- Her sender vi en suksessfull melding, dersom registreringen ble gjennomført. -->
    <?php 
    
    if(isset($_SESSION['meldinger']))
    {
        ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Bra jobbet!</strong> <?= $_SESSION['meldinger']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php 
        unset($_SESSION['meldinger']);
    } 

?>
                <h2>Heading</h2>
                <p class="w-lg-50">Curae hendrerit donec commodo hendrerit egestas tempus, turpis facilisis nostra nunc. Vestibulum dui eget ultrices.</p>
            </div>
        </div>
        <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3">
            <div class="col">
                <div></div>
                <div class="py-4">
                    <div class="carousel slide" data-bs-ride="false" id="carousel-6">
                        <div class="carousel-inner">
                            <div class="carousel-item active"><img class="w-100 d-block" src="../assets/img/studio.jpg" alt="Slide Image"></div>
                            <div class="carousel-item"><img class="w-100 d-block" src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png" alt="Slide Image"></div>
                            <div class="carousel-item"><img class="w-100 d-block" src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png" alt="Slide Image"></div>
                        </div>
                        <div><a class="carousel-control-prev" href="#carousel-6" role="button" data-bs-slide="prev"><span class="carousel-control-prev-icon"></span><span class="visually-hidden">Previous</span></a><a class="carousel-control-next" href="#carousel-6" role="button" data-bs-slide="next"><span class="carousel-control-next-icon"></span><span class="visually-hidden">Next</span></a></div>
                        <ol class="carousel-indicators">
                            <li data-bs-target="#carousel-6" data-bs-slide-to="0" class="active"></li>
                            <li data-bs-target="#carousel-6" data-bs-slide-to="1"></li>
                            <li data-bs-target="#carousel-6" data-bs-slide-to="2"></li>
                        </ol>
                    </div>
                    <h4>Lorem libero donec</h4>
                    <p>Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p><button class="btn btn-primary" type="button">Se hybel</button>
                </div>
            </div>
            <div class="col">
                <div>
                    <div class="py-4">
                        <div class="carousel slide" data-bs-ride="false" id="carousel-4">
                            <div class="carousel-inner">
                                <div class="carousel-item active"><img class="w-100 d-block" src="../assets/img/studio.jpg" alt="Slide Image"></div>
                                <div class="carousel-item"><img class="w-100 d-block" src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png" alt="Slide Image"></div>
                                <div class="carousel-item"><img class="w-100 d-block" src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png" alt="Slide Image"></div>
                            </div>
                            <div><a class="carousel-control-prev" href="#carousel-4" role="button" data-bs-slide="prev"><span class="carousel-control-prev-icon"></span><span class="visually-hidden">Previous</span></a><a class="carousel-control-next" href="#carousel-4" role="button" data-bs-slide="next"><span class="carousel-control-next-icon"></span><span class="visually-hidden">Next</span></a></div>
                            <ol class="carousel-indicators">
                                <li data-bs-target="#carousel-4" data-bs-slide-to="0" class="active"></li>
                                <li data-bs-target="#carousel-4" data-bs-slide-to="1"></li>
                                <li data-bs-target="#carousel-4" data-bs-slide-to="2"></li>
                            </ol>
                        </div>
                        <h4>Lorem libero donec</h4>
                        <p>Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p><button class="btn btn-primary" type="button">Se hybel</button>
                    </div>
                </div>
            </div>
            <div class="col">
                <div>
                    <div class="py-4">
                        <div class="carousel slide" data-bs-ride="false" id="carousel-2">
                            <div class="carousel-inner">
                                <div class="carousel-item active"><img class="w-100 d-block" src="../assets/img/studio.jpg" alt="Slide Image"></div>
                                <div class="carousel-item"><img class="w-100 d-block" src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png" alt="Slide Image"></div>
                                <div class="carousel-item"><img class="w-100 d-block" src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png" alt="Slide Image"></div>
                            </div>
                            <div><a class="carousel-control-prev" href="#carousel-2" role="button" data-bs-slide="prev"><span class="carousel-control-prev-icon"></span><span class="visually-hidden">Previous</span></a><a class="carousel-control-next" href="#carousel-2" role="button" data-bs-slide="next"><span class="carousel-control-next-icon"></span><span class="visually-hidden">Next</span></a></div>
                            <ol class="carousel-indicators">
                                <li data-bs-target="#carousel-2" data-bs-slide-to="0" class="active"></li>
                                <li data-bs-target="#carousel-2" data-bs-slide-to="1"></li>
                                <li data-bs-target="#carousel-2" data-bs-slide-to="2"></li>
                            </ol>
                        </div>
                        <h4>Lorem libero donec</h4>
                        <p>Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p><button class="btn btn-primary" type="button">Se hybel</button>
                    </div>
                </div>
            </div>
            <div class="col">
                <div>
                    <div class="py-4">
                        <div class="carousel slide" data-bs-ride="false" id="carousel-5">
                            <div class="carousel-inner">
                                <div class="carousel-item active"><img class="w-100 d-block" src="../assets/img/studio.jpg" alt="Slide Image"></div>
                                <div class="carousel-item"><img class="w-100 d-block" src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png" alt="Slide Image"></div>
                                <div class="carousel-item"><img class="w-100 d-block" src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png" alt="Slide Image"></div>
                            </div>
                            <div><a class="carousel-control-prev" href="#carousel-5" role="button" data-bs-slide="prev"><span class="carousel-control-prev-icon"></span><span class="visually-hidden">Previous</span></a><a class="carousel-control-next" href="#carousel-5" role="button" data-bs-slide="next"><span class="carousel-control-next-icon"></span><span class="visually-hidden">Next</span></a></div>
                            <ol class="carousel-indicators">
                                <li data-bs-target="#carousel-5" data-bs-slide-to="0" class="active"></li>
                                <li data-bs-target="#carousel-5" data-bs-slide-to="1"></li>
                                <li data-bs-target="#carousel-5" data-bs-slide-to="2"></li>
                            </ol>
                        </div>
                        <h4>Lorem libero donec</h4>
                        <p>Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p><button class="btn btn-primary" type="button">Se hybel</button>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="py-4">
                    <div class="carousel slide" data-bs-ride="false" id="carousel-7">
                        <div class="carousel-inner">
                            <div class="carousel-item active"><img class="w-100 d-block" src="../assets/img/studio.jpg" alt="Slide Image"></div>
                            <div class="carousel-item"><img class="w-100 d-block" src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png" alt="Slide Image"></div>
                            <div class="carousel-item"><img class="w-100 d-block" src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png" alt="Slide Image"></div>
                        </div>
                        <div><a class="carousel-control-prev" href="#carousel-7" role="button" data-bs-slide="prev"><span class="carousel-control-prev-icon"></span><span class="visually-hidden">Previous</span></a><a class="carousel-control-next" href="#carousel-7" role="button" data-bs-slide="next"><span class="carousel-control-next-icon"></span><span class="visually-hidden">Next</span></a></div>
                        <ol class="carousel-indicators">
                            <li data-bs-target="#carousel-7" data-bs-slide-to="0" class="active"></li>
                            <li data-bs-target="#carousel-7" data-bs-slide-to="1"></li>
                            <li data-bs-target="#carousel-7" data-bs-slide-to="2"></li>
                        </ol>
                    </div>
                    <h4>Lorem libero donec</h4>
                    <p>Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p><button class="btn btn-primary" type="button">Se hybel</button>
                </div>
            </div>
            <div class="col">
                <div class="py-4">
                    <div class="carousel slide" data-bs-ride="false" id="carousel-3">
                        <div class="carousel-inner">
                            <div class="carousel-item active"><img class="w-100 d-block" src="../assets/img/studio.jpg" alt="Slide Image"></div>
                            <div class="carousel-item"><img class="w-100 d-block" src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png" alt="Slide Image"></div>
                            <div class="carousel-item"><img class="w-100 d-block" src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png" alt="Slide Image"></div>
                        </div>
                        <div><a class="carousel-control-prev" href="#carousel-3" role="button" data-bs-slide="prev"><span class="carousel-control-prev-icon"></span><span class="visually-hidden">Previous</span></a><a class="carousel-control-next" href="#carousel-3" role="button" data-bs-slide="next"><span class="carousel-control-next-icon"></span><span class="visually-hidden">Next</span></a></div>
                        <ol class="carousel-indicators">
                            <li data-bs-target="#carousel-3" data-bs-slide-to="0" class="active"></li>
                            <li data-bs-target="#carousel-3" data-bs-slide-to="1"></li>
                            <li data-bs-target="#carousel-3" data-bs-slide-to="2"></li>
                        </ol>
                    </div>
                    <h4>Lorem libero donec</h4>
                    <p>Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p>
                    <div class="carousel slide" data-bs-ride="false" id="carousel-1">
                        <div class="carousel-inner">
                            <div class="carousel-item active"></div>
                            <div class="carousel-item"><img class="w-100 d-block" src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png" alt="Slide Image"></div>
                            <div class="carousel-item"><img class="w-100 d-block" src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png" alt="Slide Image"></div>
                        </div>
                        <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-bs-slide="prev"><span class="visually-hidden">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button" data-bs-slide="next"><span class="carousel-control-next-icon"></span><span class="visually-hidden">Next</span></a></div>
                        <ol class="carousel-indicators">
                            <li data-bs-target="#carousel-1" data-bs-slide-to="0" class="active"></li>
                            <li data-bs-target="#carousel-1" data-bs-slide-to="1"></li>
                            <li data-bs-target="#carousel-1" data-bs-slide-to="2"></li>
                        </ol>
                    </div><button class="btn btn-primary" type="button">Se hybel</button>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/aos.min.js"></script>
    <script src="../assets/js/bs-init.js"></script>
    <script src="../https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.js"></script>
    <script src="../assets/js/Simple-Slider.js"></script>
</body>

</html>