<?php
require "conexao.php";
@session_start();
$username = $_SESSION['username'];
$nome = $_SESSION['nome'];
$painel = $_SESSION['painel'];
$password = $_SESSION['password'];
if ($password == '') {
    echo "<script language='javascript'>window.location='../index.php';</script>";
}else if($nome == ''){
    echo "<script language='javascript'>window.location='../index.php';</script>";
}else if($username == ''){
    echo "<script language='javascript'>window.location='../index.php';</script>";
}else{
  if($painel_atual != $painel){
    echo "<script language='javascript'>window.location='../index.php';</script>";
  }
}
?>