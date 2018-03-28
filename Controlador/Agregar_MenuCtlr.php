<?php

/**
 * Created by PhpStorm.
 * User: Cristtian PC
 * Date: 23/01/2018
 * Time: 18:12
 */

require_once (__DIR__.'/../Modelo/Agregar_Menu.php');

if(!empty($_GET['action'])){
    Agregar_MenuCtlr::main($_GET['action']);
}else{
    echo "Ninguna Accion";
}
class Agregar_MenuCtlr
{

    static function main($action){
        if ($action == "crear"){
            Agregar_MenuCtlr::crear();
        }
    }

    static public function crear (){
        try {
            $addMenu = array();
            $addMenu['icon_view'] = $_POST['icon_view'];
            $addMenu['icon_down'] = $_POST['icon_down'];
            $addMenu['name'] = $_POST['name'];
            $addMenu['link'] = $_POST['link'];
            
            $Agregar_Menu = new Agregar_Menu($addMenu);
            $Agregar_Menu->insert();
            header("Location: ../#?Yea");
        } catch (Exception $e) {
            header("Location: ../Vista/index.php?noo");
        }
    }

    public function buscarAll (){
        try {
            return Peliculas::getAll();
        } catch (Exception $e) {
            header("Location: ../ListaImg.php?respuesta=error");
        }
    }

    public function buscar ($Query){
        try {
            return Peliculas::buscar($Query);
        } catch (Exception $e) {
            header("Location: ../ListaImg.php?respuesta=error");
        }
    }
}
?>