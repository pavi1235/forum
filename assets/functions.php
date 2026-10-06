<?php

require_once 'config/db.php';

function insertForumpost($username, $message) {
    $sql = "insert into forum (username, message) values (:username, :msg)";

    global $forum;

    $stmt = $forum->prepare($sql);

    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':msg', $message);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

function getForumPosts() {
    $sql = "select * from forum order by time desc";

    global $forum;
    $stmt = $forum->prepare($sql);
    $stmt->execute();
    return $stmt;
}


function login($username, $password) {
    global $forum;

    $sql = "SELECT password FROM user
            WHERE username = :username";

    $stmt = $forum->prepare($sql);
    $stmt->bindValue(':username', $username);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    return $user && password_verify($password, $user['password']);
}

function addUser($felt){
      //INSERT INTO user(username, name, email, password) 
    //VALUES ('[value-1]','[value-2]','[value-3]','[value-4]')

    $sql = "INSERT INTO user(username, name, email, password) VALUES (:username, :name, :email, :password)";

    global $forum;

    $stmt = $forum->prepare($sql);

    $stmt->bindValue(':username', $felt['username']);
    $stmt->bindValue(':name', $felt['name']);
    $stmt->bindValue(':email', $felt['email']);
    $passwordHash = password_hash($felt['password'], PASSWORD_DEFAULT);
$stmt->bindValue(':password', $passwordHash);

   try {
    $stmt->execute();
} catch (Exception $e) {
    return false;
}

return true;
}

function getUser($username) {
    global $forum;

    $sql = "SELECT username, name, email
            FROM user
            WHERE username = :username";

    $stmt = $forum->prepare($sql);
    $stmt->bindValue(':username', $username);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}



function updateUser($username, $name, $email, $password) {
    global $forum;

    $sql = "UPDATE user
            SET name = :name,
                email = :email,
                password = :password
            WHERE username = :username";

    $stmt = $forum->prepare($sql);

    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':password', $password);

    return $stmt->execute();
}
//UPDATE `user` SET `username`='[value-1]',`name`='[value-2]',`email`='[value-3]',`password`='[value-4]' WHERE 1//


function getForumPostsByUser($username) {
    global $forum;

    $sql = "SELECT * FROM forum WHERE username = :username ORDER BY time DESC";

    $stmt = $forum->prepare($sql);
    $stmt->bindValue(':username', $username);
    $stmt->execute();

    return $stmt;
}


