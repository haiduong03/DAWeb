<form action="1.php" method="POST" enctype="multipart/form-data">
    <div><img src="./apple-touch-icon.png"></div>
    <button type="submit" class="button green" id="product" name="product" value="change">Confirm</button>
</form>
<?php
$folder = "uploads/";

$image = $_FILES['image']['name'];

$path = $folder . $image;

$target_file = $folder . basename($image);


$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);


$allowed = array('jpeg', 'png', 'jpg');

$filename = $_FILES['image']['name'];

$ext = pathinfo($filename, PATHINFO_EXTENSION);

if (!in_array($ext, $allowed)) {

    echo "Sorry, only JPG, JPEG, PNG & GIF  files are allowed.";
} else {

    move_uploaded_file($_FILES['image']['tmp_name'], $path);

    $sth = $con->prepare("insert into users(image)values(:image) ");

    $sth->bindParam(':image', $image);

    $sth->execute();
}
