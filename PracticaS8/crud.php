<?php
include_once 'db.php';

if(isset($_POST['save']))
{
    $anio = $MySQLiconn->real_escape_string($_POST['anio']);
    $autor = $MySQLiconn->real_escape_string($_POST['autor']);
    $titulo = $MySQLiconn->real_escape_string($_POST['titulo']);
    $url = $MySQLiconn->real_escape_string($_POST['url']);
    $especialidad = $MySQLiconn->real_escape_string($_POST['especialidad']);
    $editorial = $MySQLiconn->real_escape_string($_POST['editorial']);
 

    $SQL = $MySQLiconn->query("INSERT INTO biblioteca (anio,autor,titulo,url,especialidad,editorial) VALUES('$anio','$autor','$titulo','$url','$especialidad','$editorial')");

    if(!$SQL)
    {
        echo $MySQLiconn->error;
    }
}


if(isset($_GET['del']))
{
    $SQL = $MySQLiconn->query("DELETE FROM biblioteca WHERE id=".$_GET['del']);
    header("Location: index.php");
}



if(isset($_GET['edit'])){
    
    $SQL=$MySQLiconn->query("SELECT * FROM biblioteca WHERE id=".$_GET['edit']);

    $getRow=$SQL->fetch_array();  
}

if(isset($_POST['update'])){

    $SQL=$MySQLiconn->query("UPDATE biblioteca SET anio='".$_POST['anio']."', autor='".$_POST['autor']."', titulo='".$_POST['titulo']."', url='".$_POST['url']."', especialidad='".$_POST['especialidad']."', editorial='".$_POST['editorial']."' WHERE id=".$_GET['edit']);
    
    header("Location: index.php");
}