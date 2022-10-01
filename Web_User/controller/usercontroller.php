<?php
function checkEmailValid($email)
{
    $pattern_email = "/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/";
    return (!preg_match($pattern_email, $email)) ? FALSE : TRUE;
}

function checkPasswordValid($password)
{
    $pattern = "/^[a-zA-Z-' ]*$/";
    return (!preg_match($pattern, $password)) ? FALSE : TRUE;
}

function connectDatabase()
{
    $servername = "localhost";
    $database = "web";
    $username = "root";
    $password = "";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database;charset=utf8", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        die();
    }
    $conn = null;
}

function checkEmail($email)
{
    $stmt = connectDatabase()->prepare("SELECT ClientEmail FROM user WHERE ClientEmail ='$email'");
    $stmt->execute();
    $result = $stmt->fetchColumn();
    return $result;
}

function checkPass($pass, $email)
{
    $stmt = connectDatabase()->prepare("SELECT ClientPassword FROM user WHERE ClientEmail ='$email'");
    $stmt->execute();
    $result = $stmt->fetchColumn();
    $verify = password_verify($pass, $result);
    return $verify;
}

function signIn($email, $pass)
{

    if (checkEmail($email) > 0  && checkPass($pass, $email) > 0) {
        $stmt = connectDatabase()->prepare("SELECT ClientName FROM user WHERE ClientEmail ='$email'");
        $stmt->execute();
        $result = $stmt->fetchColumn();
        session_start();
        $_SESSION["user_name"] = $result;
        $_SESSION["email"] = $email;
        header("Location: ../index.php");
        return $result;
    } else {
        header("Location: ../signin.php?Message=Sign in failed!!! Please try again");
    }
}

function signUp($user)
{

    $user_name = $user->get_username();
    $email = $user->get_email();
    $pass = $user->get_password();
    $address = $user->get_address();
    $phonenumber = $user->get_phone();
    $gender = $user->get_gender();
    $hash = password_hash($pass, PASSWORD_DEFAULT);


    $stmt = connectDatabase()->prepare("INSERT INTO user (ClientName, ClientEmail, ClientPassword, ClientAddress, ClientPhone, ClientGender) VALUES (:ClientName,:ClientEmail,:ClientPassword,:ClientAddress,:ClientPhone,:ClientGender)");
    $stmt->bindParam(':ClientName', $user_name);
    $stmt->bindParam(':ClientEmail', $email);
    $stmt->bindParam(':ClientPassword', $hash);
    $stmt->bindParam(':ClientAddress', $address);
    $stmt->bindParam(':ClientPhone', $phonenumber);
    $stmt->bindParam(':ClientGender', $gender);
    $stmt->execute();

    session_start();
    $_SESSION["user_name"] = $user_name;
    $_SESSION["email"] = $email;
    header("Location: ../views/index.php?Message=Welcome to our website !!!");
}

function signOut()
{
    if (isset($_SESSION['user_name'])) {
        unset($_SESSION['user_name']);
        session_destroy();
    }
}
function changePass($new_pass, $email)
{
    $hash = password_hash($new_pass, PASSWORD_DEFAULT);
    $stmt = connectDatabase()->prepare("UPDATE user set ClientPassword='$hash' WHERE ClientEmail = '$email'");
    $stmt->execute();
    signOut();
    header("Location: ../index.php?Message=Change password successful !!! Please sign in !!!");
}

function get_infor($email)
{
    include_once './model/user.php';

    $stmt = connectDatabase()->prepare("SELECT * FROM USER WHERE ClientEmail='$email'");
    $stmt->execute();
    $user = $stmt->fetchAll();

    foreach ($user as $row) {
        $user = new User(
            $row['ClientID'],
            $row['ClientName'],
            $row['ClientEmail'],
            $row['ClientPassword'],
            $row['ClientAddress'],
            $row['ClientPhone'],
            $row['ClientGender']
        );
    }

    return $user;
}

function printProduct()
{
    include_once '../model/product.php';

    $stmt = connectDatabase()->prepare("SELECT * FROM PRODUCT ");
    $stmt->execute();
    $listProduct = array();
    while ($row = $stmt->fetch()) {
        array_push(
            $listProduct,
            new Product(
                $row['ProductID'],
                $row['ProductName'],
                $row['ProductDetail'],
                $row['ProductBrand'],
                $row['ProductType'],
                $row['ProductSize'],
                $row['ProductColor'],
                $row['ProductImg'],
                $row['ProductPrice'],
                $row['ProductPromotion']
            )
        );
    }

    return $listProduct;
}

function inforProduct($id)
{

    // include_once("../model/product.php");
    $stmt = connectDatabase()->prepare("SELECT * FROM PRODUCT WHERE ProductID='$id';");
    $stmt->execute();
    $product = $stmt->fetchAll();
    foreach ($product as $row) {
        $product = new Product(
            $row['ProductID'],
            $row['ProductName'],
            $row['ProductDetail'],
            $row['ProductBrand'],
            $row['ProductType'],
            $row['ProductSize'],
            $row['ProductColor'],
            $row['ProductImg'],
            $row['ProductPrice'],
            $row['ProductPromotion']
        );
    }
    return $product;
}

function addProduct()
{

    include_once("../model/product.php");
    $id = $_GET['id'];

    if (isset($_GET['qty']))
        $qty = $_GET['qty'];
    else
        $qty = $_POST['qty'];

    $product = inforProduct($id);


    if ($product->get_promotion() > 0)
        $price = $product->get_promotion();
    else
        $price = $product->get_price();

    $listProduct = array(
        $product->get_id() => array(
            'name' => $product->get_name(),
            'id' => $product->get_id(),
            'qty' =>  $qty,
            'price' =>  $price,
            'image' => $product->get_image(),
        )
    );


    session_start();
    if (!empty($_SESSION['cart_item'])) {
        if (in_array($product->get_id(), array_keys($_SESSION["cart_item"]))) {
            foreach ($_SESSION['cart_item'] as $k => &$v) {
                if ($product->get_id() == $_SESSION['cart_item'][$k]['id']) {
                    $_SESSION['cart_item'][$k]['qty'] += $qty;
                }
            }
        } else
            $_SESSION['cart_item'] +=  $listProduct;
    } else
        $_SESSION['cart_item'] = $listProduct;
    header('Location: ../cart.php');
}

function removeProduct()
{
    session_start();
    if (!empty($_SESSION["cart_item"])) {
        foreach ($_SESSION["cart_item"] as $k => $v) {
            if ($_GET["id"] == $_SESSION["cart_item"][$k]['id'])
                unset($_SESSION["cart_item"][$k]);
        }
    }
}

function updateProduct()
{
    session_start();
    if (!empty($_SESSION["cart_item"])) {
        foreach ($_SESSION["cart_item"] as $k => $v) {
            if ($_GET["id"] == $_SESSION["cart_item"][$k]['id']) {
                if ($_POST['qty'] == 0)
                    unset($_SESSION["cart_item"][$k]);
                else
                    $_SESSION["cart_item"][$k]['qty'] = $_POST['qty'];
            }
        }
    }
}

function findBrand($brand)
{
    include_once './model/product.php';

    $stmt = connectDatabase()->prepare("SELECT * FROM PRODUCT WHERE ProductBrand='$brand' ");
    $stmt->execute();
    $listProduct = array();
    while ($row = $stmt->fetch()) {
        array_push(
            $listProduct,
            new Product(
                $row['ProductID'],
                $row['ProductName'],
                $row['ProductDetail'],
                $row['ProductBrand'],
                $row['ProductType'],
                $row['ProductSize'],
                $row['ProductColor'],
                $row['ProductImg'],
                $row['ProductPrice'],
                $row['ProductPromotion']
            )
        );
    }
    return $listProduct;
}

if (isset($_POST['user'])) {
    switch ($_POST['user']) {
        case 'signin':
            $email = $_POST['email'];
            $pass = $_POST['password'];

            signIn($email, $pass);

            break;

        case 'signup':

            $user_name = $_POST['username'];
            $email = $_POST['email'];
            $pass = $_POST['password'];
            $confirm = $_POST['confirm'];
            $address = $_POST['address'];
            $phonenumber = $_POST['phonenumber'];
            $gender = $_POST['gender'];

            include "../model/user.php";

            $user = new User($id, $user_name, $email, $pass, $address, $phonenumber, $gender);
            if ($confirm == $pass) {
                if (checkEmail($user->get_email()) == 0) {
                    signUp($user);
                } else {
                    header("Location: ../views/signup.php?Message=Email already exist!!! Please try again");
                }
            } else {
                header("Location: ../views/signup.php?Message=Password incorrect! Please try again");
            }
            break;

        case 'changepass':

            session_start();
            $email = $_SESSION["email"];
            $old_pass = $_POST['password'];
            $new_pass = $_POST['new_password'];
            $confirm = $_POST['confirm'];

            if ($confirm == $new_pass) {
                if (checkPass($old_pass, $email))
                    changePass($new_pass, $email);
                else
                    header("Location: ../views/information.php?Message=Incorrect password !!!");
            }
            break;
    }
}

if (isset($_GET['cart']) == 'cart') {
    include_once '../model/product.php';

    addProduct();
    header('Location: ../views/category.php');
}

if (isset($_POST['cart']))
    switch ($_POST['cart']) {
        case 'add':

            addProduct();
            break;
        case 'remove':

            removeProduct();
            header('Location: ../views/cart.php');
            break;

        case 'update':

            updateProduct();
            header('Location: ../views/cart.php');
            break;

        default:
            # code...
            break;
    }

if (isset($_GET['checkout'])) {
    session_start();
    if (empty($_SESSION["user_name"]))
        header('Location: ../views/signin.php');
    else
        header('Location: ../views/checkout.php');
}
