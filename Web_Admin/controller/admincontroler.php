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

function checkEmailAdmin($email)
{
    $stmt = connectDatabase()->prepare("SELECT AdminEmail FROM admin WHERE AdminEmail ='$email'");
    $stmt->execute();
    return $result = $stmt->fetchColumn();
}

function checkPassAdmin($pass, $email)
{
    $stmt = connectDatabase()->prepare("SELECT AdminPassword FROM admin WHERE AdminEmail ='$email'");
    $stmt->execute();
    $result = $stmt->fetchColumn();
    return $verify = password_verify($pass, $result);
}

function signIn($email, $pass)
{
    if (checkEmailAdmin($email) > 0  && checkPassAdmin($pass, $email) > 0) {
        $stmt = connectDatabase()->prepare("SELECT AdminName FROM admin WHERE AdminEmail ='$email'");
        $stmt->execute();
        $result = $stmt->fetchColumn();
        session_start();
        $_SESSION["user_name"] = $result;
        $_SESSION["email"] = $email;
        header("Location: ../views/index.php");
        return $result;
    } else {
        header("Location: ../views/signin.php?Message=Sign in failed!!! Please try again");
    }
}

function signUp($user)
{
    $user_name = $user->get_username();
    $email = $user->get_email();
    $pass = $user->get_password();
    $address = $user->get_address();
    $phone = $user->get_phone();
    $gender = $user->get_gender();
    $hash = password_hash($pass, PASSWORD_DEFAULT);


    $stmt = connectDatabase()->prepare("INSERT INTO ADMIN (AdminName, AdminEmail, AdminPassword, AdminAddress, AdminPhone, AdminGender) VALUES (:AdminName,:AdminEmail,:AdminPassword,:AdminAddress,:AdminPhone,:AdminGender)");
    $stmt->bindParam(':AdminName', $user_name);
    $stmt->bindParam(':AdminEmail', $email);
    $stmt->bindParam(':AdminPassword', $hash);
    $stmt->bindParam(':AdminAddress', $address);
    $stmt->bindParam(':AdminPhone', $phone);
    $stmt->bindParam(':AdminGender', $gender);
    $stmt->execute();
    session_start();
    $_SESSION["user_name"] = $user_name;
    $_SESSION["email"] = $email;
    header("Location: ../views/index.php?Message=Create successfull !!!");
}

function signOut()
{
    if (isset($_SESSION['user_name'])) {
        unset($_SESSION['user_name']);
        session_destroy();
        header("Location: ../views/index.php?Message=Change password successfull !!! Please sign in !!!");
    }
}

function inforAdmin($id)
{
    include_once './views/model/user.php';

    $stmt = connectDatabase()->prepare("SELECT * FROM ADMIN WHERE AdminID='$id';");
    $stmt->execute();
    $admin = $stmt->fetchAll();
    foreach ($admin as $row) {
        $admin = new User(
            $row['AdminID'],
            $row['AdminName'],
            $row['AdminEmail'],
            $row['AdminPassword'],
            $row['AdminAddress'],
            $row['AdminPhone'],
            $row['AdminGender']
        );
    }
    return $admin;
}

function get_infor($email)
{
    include_once '../model/user.php';

    $stmt = connectDatabase()->prepare("SELECT * FROM ADMIN WHERE AdminEmail='$email'");
    $stmt->execute();
    $admin = $stmt->fetchAll();
    foreach ($admin as $row) {
        $admin = new User($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6]);
    }
    return $admin;
}

function printAdmin()
{
    include_once '../model/user.php';

    $stmt = connectDatabase()->prepare("SELECT * FROM admin ");
    $stmt->execute();
    $listAdmin = array();
    while ($row = $stmt->fetch()) {
        array_push(
            $listAdmin,
            new User(
                $row['AdminID'],
                $row['AdminName'],
                $row['AdminEmail'],
                $row['AdminPassword'],
                $row['AdminAddress'],
                $row['AdminPhone'],
                $row['AdminGender']
            )
        );
    }

    return $listAdmin;
}

function changeAdminName($new_name, $id)
{
    $stmt = connectDatabase()->prepare("UPDATE admin set AdminName='$new_name' WHERE AdminID = '$id'");
    $stmt->execute();
    header("Location: ../views/admin.php?Message=Change password successfull !!!");
}

function changeAdminPass($new_pass, $id)
{
    $hash = password_hash($new_pass, PASSWORD_DEFAULT);
    $stmt = connectDatabase()->prepare("UPDATE admin set AdminPassword='$hash' WHERE AdminID= '$id'");
    $stmt->execute();
    header("Location: ../views/admin.php?Message=Change password successfull !!!");
}

function changeAdminEmail($new_email, $id)
{
    if (checkEmailAdmin($new_email) > 0) {
        header("Location: ../views/user.php?Message=New email already exist !!!");
    } else {
        $stmt = connectDatabase()->prepare("UPDATE admin set AdminEmail='$new_email' WHERE AdminID = '$id'");
        $stmt->execute();
        header("Location: ../views/admin.php?Message=Change successfull !!!");
    }
}

function changeAdminAddress($new_address, $id)
{
    $stmt = connectDatabase()->prepare("UPDATE admin set AdminAddress='$new_address' WHERE AdminID = '$id'");
    $stmt->execute();
    header("Location: ../views/admin.php?Message=Change successfull !!!");
}

function changeAdminPhone($new_phone, $id)
{
    $stmt = connectDatabase()->prepare("UPDATE admin set AdminPhone='$new_phone' WHERE AdminID = '$id'");
    $stmt->execute();
    header("Location: ../views/admin.php?Message=Change successfull !!!");
}

function changeAdminGender($new_gender, $id)
{
    $stmt = connectDatabase()->prepare("UPDATE admin set AdminGender='$new_gender' WHERE AdminID = '$id'");
    $stmt->execute();
    header("Location: ../views/admin.php?Message=Change successfull !!!");
}

function deleteAdmin($id)
{
    $stmt = connectDatabase()->prepare("DELETE FROM admin WHERE AdminID = '$id'");
    $stmt->execute();
    header("Location: ../views/admin.php?Message=Delete successfull !!!");
}

if (isset($_POST['admin'])) {
    switch ($_POST['admin']) {
        case $_POST['admin'] == 'signin':

            $email = $_POST['email'];
            $pass = $_POST['password'];

            signIn($email, $pass);
            break;

        case $_POST['admin'] == 'signup' || $_POST['admin'] == 'create':

            $user_name = $_POST['username'];
            $email = $_POST['email'];
            $pass = $_POST['password'];
            $confirm = $_POST['confirm'];
            $address = $_POST['address'];
            $phonenumber = $_POST['phonenumber'];
            $gender = $_POST['gender'];
            $id = null;

            include "../model/user.php";

            $admin = new User($id, $user_name, $email, $pass, $address, $phonenumber, $gender);

            if ($confirm == $pass) {
                if (checkEmailAdmin($admin->get_email()) == 0) {
                    signUp($admin);
                } else {
                    if ($_POST['admin'] == 'signup')
                        header("Location: ../views/signup.php?Message=Email already exist!!! Please try again");
                    header("Location: ../views/admin_action.php?Message=Email already exist!!! Please try again");
                }
            } else {
                if ($_POST['admin'] == 'signup')
                    header("Location: ../views/signup.php?Message=Email already exist!!! Please try again");
                header("Location: ../views/admin_action.php?Message=Email already exist!!! Please try again");
            }

            break;

        case $_POST['admin'] == 'change':

            $user_name = $_POST['username'];
            $email = $_POST['email'];
            $pass = $_POST['password'];
            $new_pass = $_POST['new_password'];
            $confirm = $_POST['confirm'];
            $address = $_POST['address'];
            $phonenumber = $_POST['phonenumber'];
            $gender = $_POST['gender'];
            $id = $_GET['id'];

            if ($user_name > 0) {
                changeAdminName($user_name, $id);
            }

            if ($address  > 0) {
                changeAdminAddress($address, $id);
            }

            if ($email > 0) {
                changeAdminEmail($email, $id);
            }

            if ($phonenumber > 0) {
                changeAdminPhone($phonenumber, $id);
            }

            if ($gender > 0) {
                changeAdminGender($gender, $id);
            }

            if ($new_pass > 0 && $confirm > 0 && $confirm == $new_pass || checkPassAdmin($pass, $id) > 0) {
                changeAdminPass($new_pass, $email);
            }

            break;

        case $_POST['admin'] == 'delete':

            $id = $_GET['id'];
            deleteAdmin($id);

            break;

        default:
            # code...
            break;
    }
}
