<?php
session_start();
include "../config/database.php";

$login = $_POST['login'];
$senha = $_POST['password'];

$_SESSION["login"] = $login;
$_SESSION["password"] = $senha;

$sql = "SELECT 
         TB01066_USUARIO Usuario,
         TB01066_SENHA Senha,
         TB01066_FINANCEIRO Finc
        FROM 
         TB01066
        WHERE 
        TB01066_USUARIO = '$login'
        AND TB01066_SENHA = '$senha'";

$stmt = sqlsrv_query($conn, $sql);

$usuario = null;
$Finc = null;

while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    $usuario = $row['Usuario'];
    $senha = $row['Senha'];
    $Finc = $row['Finc'];
}

if ($usuario != null && $Finc == 1) {
    echo "<script>location.href='../views/index.php'</script>";
} else {
    echo "<script>window.alert('Fazer login!')</script>";
    echo "<script>location.href='../views/login.php'</script>";
}
