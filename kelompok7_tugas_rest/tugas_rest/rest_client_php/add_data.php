<?php
include('function.php');

if (isset($_POST["submit"])) {
    $judul = $_POST["judul"];
    $jenis = $_POST["jenis"];
    $genre = $_POST["genre"];
    $penilaian = $_POST["penilaian"];
    $tahun = $_POST["tahun"];

    $stringData = "judul=$judul&genre=$genre&jenis=$jenis&penilaian=$penilaian&tahun=$tahun";
    $response = postData("http://localhost:8080/film/service/json/create", $stringData);
    $response = json_decode($response);
    $success = $response->success;
    $message = $response->message;

    header("Location: index.php?success=$success&message=$message");
}
