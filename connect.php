<?php
session_start();
// koneksi ke database
$conn = mysqli_connect('localhost', 'root', '', 'db_electi_store');

// text deskripsi feature di index.php
$textFeature = [
    ["Original Product", "The products we provide are all original"],
    ["Lots of Promos", "Price promos will always be present at every certain time event"],
    ["Guaranteed Quality", "There is no need to doubt the quality of the product because we only sell original products"],
    ["Affordable Prices", "In addition to quality, the prices we offer are very affordable"]
];
