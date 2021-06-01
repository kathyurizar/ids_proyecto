<?php
    include_once "class.db.php";

  @session_start();
  if(!isset($_SESSION['user'])){
    header('location:../login');
  }


    class Categoria{

    public function __construct(){
        $db = New DB();
        $this->bd = $db->conecta();  
    }


    //LISTADO DE PRODUCTOS
    public function getCategorias(){
        $sql = "SELECT * FROM categoria";

        $eje_new2 = $this->bd->prepare($sql);
        if ($eje_new2->execute()){
            $rowR = $eje_new2->fetchAll();
            return $rowR;
        }
    }

    public function nuevaCategoria($categoria){

        try{

            $this->bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->bd->beginTransaction();

            $sql = "INSERT INTO categoria(nom_cat) 
            values ('$categoria')";

            $this->bd->exec($sql);

            $this->bd->commit();
            return true;
        }catch(Exception $e){
            $this->bd->rollback();
            return false;
        }
        
    }
    
} // fin clase
