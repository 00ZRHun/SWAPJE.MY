<?php
function get_user_detail($id, $dbh)
{
    // include_once 'includes/config.php';

    $sql = "SELECT * FROM users WHERE id = :id";
    $query = $dbh->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_STR);
    $query->execute();

    $result = $query->fetch();

    return $result;
}

