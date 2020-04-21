<?php
include('function.php');
$data = getData("http://localhost:8080/film/service/json/get");
$films = json_decode($data, true);
$films = $films["data"];

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhaina+2&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <link rel="stylesheet" href="styles/hover-min.css">
    <link rel="stylesheet" href="styles/style.css">

    <title>Film</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3 fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php"><strong>F I L M S</strong></a>

            <div class="navbar-nav">
                <!-- Button trigger modal -->
                <a class="nav-item nav-link" data-backdrop="static" data-keyboard="false" href="#" data-toggle="modal" data-target="#modalAddData"><i class="fas fa-fw fa-plus"></i> Add data</a>
            </div>
        </div>
    </nav>

    <div class="container" style="margin-top: 70px">
        <h3 class="text-dark">List of Films :</h3>
        <?php if (isset($_GET['success'])) {
            include_once('components/alert.php');
        }
        ?>
        <div class="row">
            <?php foreach ($films as $film) : ?>
                <div class="col-3 mb-2">
                    <div class="flip-card animated slideInUp fast">
                        <div class="flip-card-inner" style="width: 275px">
                            <div class="card flip-card-front">
                                <div class="card-body m-auto">
                                    <h4 class="card-title"><?= $film["judul"] ?></h4>
                                    <h6 class="card-subtitle mb-2 text-muted"><?= $film["jenis"] . ' | ' . $film["genre"] ?></h6>
                                    <p class="card-text"><i class="fas fa-star" style="color:rgb(248, 213, 17)"></i> <?= $film["penilaian"] ?></p>
                                    <p class="card-text">Years: <?= $film["tahun"] ?></p>
                                    <a href="#" class="card-link">Hover me!</a>
                                </div>
                            </div>
                            <div class="card flip-card-back p-2">
                                <div class="card-body d-flex flex-column">
                                    <a href="#" data-toggle="modal" data-target="#modalUpdateData<?= $film['id'] ?>" data-backdrop="static" data-keyboard="false" class="update btn btn-light mb-2 hvr-grow p-4" style="height: 40%">Update</a>
                                    <a href="#" data-toggle="modal" data-target="#modalDeleteData<?= $film['id'] ?>" data-backdrop="static" data-keyboard="false" class="delete btn btn-light mb-3 hvr-grow p-4" style="height: 40%">Delete</a>
                                    <a href="https://www.google.com/search?q=<?= $film['judul'] ?>" target="_blank" class="card-link text-light hvr-grow"><i class="fab fa-google"></i>&nbsp; Search on Google</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php include('components/update_modal.php') ?>
                <?php include('components/delete_modal.php') ?>
            <?php endforeach; ?>
        </div>
    </div>

    <?php include('components/add_modal.php') ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>