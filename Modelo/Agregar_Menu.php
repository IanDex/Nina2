<?php

/**
 * Created by PhpStorm.
 * User: Cristtian PC
 * Date: 23/01/2018
 * Time: 18:12
 */
require_once('Conexion.php');

class Agregar_Menu extends Conexion
{

    private $id_menu;
    private $icon_view;
    private $icon_down;
    private $name;
    private $link;
    private $_order;

    public function __construct($addarray = array())
    {

        parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        if(count($addarray)>1){ //
            foreach ($addarray as $campo => $valor){
                $this->$campo = $valor;
            }
        }else {
            $this->id_menu = "";
            $this->icon_view = "";
            $this->icon_down = "";
            $this->link = "";
            $this->_order = "";
        }
    }

    function __destruct() {
        $this->Disconnect();
        
    }

    public static function buscarForId($id)
    {
        $Especial = new Especialidad();
        if ($id > 0){
            $getrow = $Especial->getRow("SELECT * FROM especialidad WHERE idEspecialidad =?", array($id));
            $Especial->idEspecialidad = $getrow['idEspecialidad'];
            $Especial->Nombre = $getrow['Nombre'];
            $Especial->Estado = $getrow['Estado'];
            $Especial->Disconnect();
            return $Especial;
        }else{
            return NULL;
        }
    }

    public static function buscar($query)
    {
        $PeliculasD = array();
        $tmp = new Peliculas();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
            $pdatos = new Peliculas();
            $pdatos->id_peli = $valor['id_peli'];
            $pdatos->Nombre = $valor['Nombre'];
            $pdatos->Codigo = $valor['Codigo'];
            $pdatos->Descripcion = $valor['Descripcion'];
            array_push($PeliculasD, $pdatos);
        }
        $tmp->Disconnect();
        return $PeliculasD;
    }

    public static function getAll()
    {

        return Peliculas::buscar("SELECT * FROM peliculas");
    }


    public function insert()
    {
        $this->insertRow("INSERT INTO nina.menu_left VALUES (NULL, ?, ?, ?, ?, ?)", array(
                $this->icon_view,
                $this->icon_down,
                $this->name,
                $this->link,
               
            )
        );
        $this->Disconnect();
    }

    public function editar()
    {
        $this->updateRow("UPDATE mypet.especialidad SET Nombre = ?, Estado = ? WHERE idEspecialidad = ?", array(
            $this->Nombre,
            $this->Estado,
            $this->idEspecialidad,
        ));
        $this->Disconnect();
    }

    protected function eliminar($id)
    {
        // TODO: Implement eliminar() method.
    }
    
      public function getId_menu()
    {
        return $this->id_menu;
    }
    /**
     * @param mixed $id_peli
     */
    public function setId_menu($id_menu)
    {
        $this->id_menu = $id_menu;
    }

      public function getIcon_view()
    {
        return $this->icon_view;
    }
    /**
     * @param mixed $id_peli
     */
    public function setIcon_view($icon_view)
    {
        $this->icon_view = $icon_view;
    }

     public function getIcon_down()
    {
        return $this->icon_down;
    }
    /**
     * @param mixed $Icon_down
     */
    public function setIcon_down($icon_down)
    {
        $this->icon_down = $icon_down;
    }
     public function getName()
    {
        return $this->name;
    }
    /**
     * @param mixed $id_peli
     */
    public function setName($name)
    {
        $this->name = $name;
    }
    public function getLink()
    {
        return $this->link;
    }
    /**
     * @param mixed $id_peli
     */
    public function setLink($link)
    {
        $this->link = $link;
    }

    public function get_Order()
    {
        return $this->_order;
    }
    /**
     * @param mixed $id_peli
     */
    public function set_Order($_order)
    {
        $this->_order = $_order;
    }
}

