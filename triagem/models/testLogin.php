<?php
function testLogin($conn)
{
    session_start();

    if (!isset($_SESSION["login"]) || !isset($_SESSION["password"])) {
        echo "<script>alert('Fazer login!'); location.href='login.php';</script>";
        exit;
    }

    $login = $_SESSION["login"];
    $senha = $_SESSION["password"];

    $sql = "SELECT 
                TB01066_USUARIO AS Usuario,
                TB01066_SENHA AS Senha,
                TB01066_FINANCEIRO AS Finc
            FROM TB01066
            WHERE TB01066_USUARIO = '$login'
              AND TB01066_SENHA = '$senha'";

    $stmt = sqlsrv_query($conn, $sql);

    $usuario = null;
    $Finc = null;

    if ($stmt && $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $usuario = $row['Usuario'];
        $Finc = $row['Finc'];
    }

    if ($usuario !== null && $Finc == 1) {
        return true;
    } else {
        echo "<script>alert('Fazer login!'); location.href='login.php';</script>";
        exit;
    }
}
