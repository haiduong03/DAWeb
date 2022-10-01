<?php
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
function printUser()
{
    include_once '../model/user.php';

    $stmt = connectDatabase()->prepare("SELECT * FROM user ");
    $stmt->execute();
    $listUser = array();
    while ($row = $stmt->fetch()) {
        array_push(
            $listUser,
            new User(
                $row['ClientID'],
                $row['ClientName'],
                $row['ClientEmail'],
                $row['ClientPassword'],
                $row['ClientAddress'],
                $row['ClientPhone'],
                $row['ClientGender']
            )
        );
    }

    return $listUser;
}

function checkEmailUser($email)
{
    $stmt = connectDatabase()->prepare("SELECT ClientEmail FROM user WHERE ClientEmail ='$email'");
    $stmt->execute();
    $result = $stmt->fetchColumn();
    return $result;
}

function checkPassUser($pass, $id)
{
    $stmt = connectDatabase()->prepare("SELECT ClientPassword FROM user WHERE ClientID ='$id'");
    $stmt->execute();
    $result = $stmt->fetchColumn();
    $verify = password_verify($pass, $result);
    return $verify;
}

function changeUserName($new_name, $id)
{
    $stmt = connectDatabase()->prepare("UPDATE user set ClientName='$new_name' WHERE ClientID = '$id'");
    $stmt->execute();
    header("Location: ../views/user.php?Message=Change successfull !!!");
}

function changeUserPass($new_pass, $id)
{
    $hash = password_hash($new_pass, PASSWORD_DEFAULT);
    $stmt = connectDatabase()->prepare("UPDATE user set ClientPassword='$hash' WHERE ClientID = '$id'");
    $stmt->execute();
    header("Location: ../views/user.php?Message=Change successfull !!!");
}

function changeUserEmail($new_email, $id)
{
    if (checkEmailUser($new_email) > 0) {
        header("Location: ../views/user.php?Message=New email already exist !!!");
    } else {
        $stmt = connectDatabase()->prepare("UPDATE user set ClientEmail='$new_email' WHERE ClientID = '$id'");
        $stmt->execute();
        header("Location: ../views/user.php?Message=Change successfull !!!");
    }
}

function changeUserAddress($new_address, $id)
{
    $stmt = connectDatabase()->prepare("UPDATE user set ClientAddress='$new_address' WHERE ClientID = '$id'");
    $stmt->execute();
    header("Location: ../views/user.php?Message=Change successfull !!!");
}

function changeUserPhone($new_phone, $id)
{
    $stmt = connectDatabase()->prepare("UPDATE user set ClientPhone='$new_phone' WHERE ClientID = '$id'");
    $stmt->execute();
    header("Location: ../views/user.php?Message=Change successfull !!!");
}

function changeUserGender($new_gender, $id)
{
    $stmt = connectDatabase()->prepare("UPDATE user set ClientGender='$new_gender' WHERE ClientID = '$id'");
    $stmt->execute();
    header("Location: ../views/user.php?Message=Change successfull !!!");
}

function inforUser($id)
{
    include_once '../model/user.php';

    $stmt = connectDatabase()->prepare("SELECT * FROM USER WHERE ClientID='$id';");
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

function create($user)
{
    $user_name = $user->get_username();
    $email = $user->get_email();
    $pass = $user->get_password();
    $address = $user->get_address();
    $phone = $user->get_phone();
    $gender = $user->get_gender();
    $hash = password_hash($pass, PASSWORD_DEFAULT);


    $stmt = connectDatabase()->prepare("INSERT INTO user (ClientName, ClientEmail, ClientPassword, ClientAddress, ClientPhone, ClientGender) VALUES (:ClientName,:ClientEmail,:ClientPassword,:ClientAddress,:ClientPhone,:ClientGender)");
    $stmt->bindParam(':ClientName', $user_name);
    $stmt->bindParam(':ClientEmail', $email);
    $stmt->bindParam(':ClientPassword', $hash);
    $stmt->bindParam(':ClientAddress', $address);
    $stmt->bindParam(':ClientPhone', $phone);
    $stmt->bindParam(':ClientGender', $gender);
    $stmt->execute();
    header("Location: ../views/user.php?Message=Create successfull !!!");
}

function deleteUser($id)
{
    $stmt = connectDatabase()->prepare("DELETE FROM user WHERE ClientID = '$id'");
    $stmt->execute();
    header("Location: ../views/user.php?Message=Delete successfull !!!");
}

if (isset($_POST['user'])) {
    switch ($_POST['user']) {
        case $_POST['user'] == 'create':

            $user_name = $_POST['username'];
            $email = $_POST['email'];
            $pass = $_POST['password'];
            $confirm = $_POST['confirm'];
            $address = $_POST['address'];
            $phone = $_POST['phonenumber'];
            $gender = $_POST['gender'];
            $id = null;
            include "../model/user.php";

            $user = new User($id, $user_name, $email, $pass, $address, $phone, $gender);

            if ($confirm == $pass) {
                if (checkEmailUser($user->get_email()) == 0) {
                    create($user);
                } else {
                    header("Location: ../views/user_action.php?Message=Email already exist!!! Please try again");
                }
            } else {
                header("Location: ../views/user_action.php?Message=Password incorrect! Please try again");
            }

            break;

        case $_POST['user'] == 'change':

            $user_name = $_POST['username'];
            $email = $_POST['email'];
            $pass = $_POST['password'];
            $confirm = $_POST['confirm'];
            $address = $_POST['address'];
            $phone = $_POST['phonenumber'];
            $gender = $_POST['gender'];
            $id = $_GET['id'];

            if ($user_name > 0) {
                changeUserName($user_name, $id);
            }

            if ($address  > 0) {
                changeUserAddress($address, $id);
            }

            if ($email > 0) {
                changeUserEmail($email, $id);
            }

            if ($phone > 0) {
                changeUserPhone($phone, $id);
            }

            if ($gender > 0) {
                changeUserGender($gender, $id);
            }

            if ($new_pass > 0 && $confirm > 0 && $confirm == $new_pass || checkPassUser($pass, $id) > 0) {
                changeUserPass($new_pass, $email);
            }

            break;

        case $_POST['user'] == 'delete':

            $id = $_GET['id'];
            deleteUser($id);

            break;

        default:
            # code...
            break;
    }
}
