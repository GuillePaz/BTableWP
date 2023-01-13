<?php

class DataBase {
    private $conection;
    public $table;
    function __construct(string $host, string $db, string $root, string $pass = "", string $prefix = "",$table = "EMAP"){
        $this->$table = $prefix . $table;
        $this->conection = self::Conection($host, $db, $root, $pass);
    }
    static function Conection(string $host, string $dbname, string $root, string $pass=""){
        
        try{
            $base=new PDO("mysql:host=".$host."; dbname=".$dbname, $root, $pass );
            $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $base->exec("SET CHARACTER SET UTF8");
    
        }catch(Exception $e) {
            die("Error ".$e->getMessage());
            echo "Linea del error ".$e->getLine();
        }
        return $base;
    }
    function Create_table(){
        $con = $this->conection ;
        $query = "
        CREATE TABLE '".$this->table."' (
            ID int NOT NULL AUTO_INCREMENT,
            NOMBRE varchar(255) NOT NULL,
            APELLIDOS varchar(255) NOT NULL,
            CEDULA int,
            TELEFONO varchar(255),
            PROFESION varchar(255),
            TEMPERAMENTO varchar(255),
            LENGUAJE_AMOR varchar(255),
        );
        ";
        $error = $con->query($query);
        if(!$error) {
            return $error;
        }
    }
    function Insert_data(string $nombre,string $apellidos,
    int $cedula = 0, string $telefono = "", string $profesion = "", string $temperamento="", string $lenguaje_amor = ""){
        $con = $this->conection;
        $query = "
        INSERT INTO '".$this->table."' (ID, NOMBRE, APELLIDOS,
        CEDULA, TELEFONO, PROFESION, TEMPERAMENTO, LENGUAJE_AMOR)
        VALUES (null, $nombre, $apellidos, 
        $cedula, $telefono, $profesion, $temperamento, $lenguaje_amor);
        ";
        $error = $con->query($query);
        if(!$error) {
            return $error;
        }
        
    }
    function Update_item(int $id,string $nombre, string $apellidos,
    int $cedula,string $telefono, string $profesion, string $temperamento, string $lenguaje_amor){

        $con = $this->conection;
        $query = "
        UPDATE '".$this->table."'
        SET NOMBRE = '$nombre', APELLIDOS = '$apellidos',
        CEDULA = $cedula, TELEFONO = '$telefono', PROFESION = '$profesion', TEMPERAMENTO = '$temperamento',
        LENGUAJE_AMOR = '$lenguaje_amor'
        WHERE ID=$id;
        ";
        $error = $con->query($query);
        if(!$error) {
            return $error;
        }

    }

    function Get_item(int $id){
        $con = $this->conection;
        $query = "
            SELECT * FROM '".$this->table."' WHERE ID = $id;
        ";

        $salida = $con->query($query);
        return json_encode($salida);
    }

    function Get_all_items(){
        $con = $this->conection;
        $query = "
            SELECT * FROM '".$this->table."'
        ";

        $salida = $con->query($query);
        return json_encode($salida);
    }

    function Search_item($busqueda,string $parametro = "default"){
        $find = $this->Filter_parameter($busqueda,$parametro);

        $con = $this->conection;
        $query = "
            SELECT * FROM '".$this->table."' WHERE $find
        ";

        $salida = $con->query($query);
        return json_encode($salida);
        
    

    }

    private function Filter_parameter($busqueda, $parametro){
        $parametro = strtoupper($parametro);
        switch ($parametro){
            default:
                $parametro = "NOMBRE = '$busqueda' OR OTROS_NOMBRES = '$busqueda'
                OR APELLIDOS = '$busqueda'";
                break;
            case "NOMBRE":
                $parametro .= " = '$busqueda'";
                break;
            case "APELLIDOS":
                $parametro .= " = '$busqueda'";
                break;
            case "CEDULA":
                $parametro .= " = '$busqueda'";
                break;
            case "TELEFONO":
                $parametro .= " = '$busqueda'";
                break;
            case "PROFESION":
                $parametro .= " = '$busqueda'";
                break;
            case "TEMPERAMENTO":
                $parametro .= " = '$busqueda'";
                break;
            case "LENGUAJE_AMOR":
                $parametro .= " = '$busqueda'";
                break;
        }
        return $parametro;
    }
    }