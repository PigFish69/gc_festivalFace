<?php
require "databaseFunctions.php";

function registerUser($firstName, $lastName, $email, $password) {
    $query = "INSERT INTO users (firstName, lastName, email, password)
               VALUES ('$firstName', '$lastName', '$email', '$password')";
    $test = db_insertData($query);


}

function getUser($email, $password) {
    $query = "SELECT *
FROM users
WHERE email = '$email'
AND
password = '$password'";
    $user = db_getData($query);


    if ($user->num_rows >0) {
        return $user;
    } else {
        return "No user found";
    }
//    if ($user->rowCount() >0) {
//        return $user;
//    } else {
//        return "No user found";
//    }

}
function getUserById($userID) {
    $query = "SELECT *
FROM users
WHERE id = '$userID'";
    $user = db_getData($query);


    //    if ($user->rowCount() >0) {
    if ($user->num_rows >0) {
        return $user;
    } else {
        return "No user found";
    }

}
