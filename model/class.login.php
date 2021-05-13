<?php
include_once "class.db.php";

if (!isset($_SESSION)) {
    @session_start();
}

class Login
{
  
    private $us;
    private $pa;
    private $bd;
    private $url_actual;
    
    

    public function __construct(){
        $db = New DB();
        $this->bd = $db->conecta();  

    }

    public function autentica($user, $pass)
    {
       
        $this->us = $user;
        $this->pa = $pass;

        $encript = $this->md5_2($this->pa);
        ##  sentencia sql para consultar el usuario y contraseña
        $sql_auten = "SELECT u.ID_us, u.nombre, u.usuario, u.correo, u.rol FROM usuarios as u
                      WHERE u.estado='A' AND u.usuario=:user AND u.clave=:encript";

        ## ejecución de la sentencia sql
        $eje_auten = $this->bd->prepare($sql_auten);
        $eje_auten->bindParam(':user', $this->us);
        $eje_auten->bindParam(':encript', $encript);
        if ($eje_auten->execute()){

			## si existe inicia una sesion y guarda el nombre del usuario
            if ( $eje_auten->rowCount() != 0 ) {
                ## inicio de sesion
                $rowR = $eje_auten->fetchAll();

                foreach ($rowR as $row) {
                    ## configurar un elemento usuario dentro del arreglo global $_SESSION
                    $_SESSION['id_user']=$row['ID_us'];
                    $_SESSION['user']=$row['usuario'];
                    $_SESSION['nombre_user']=$row['nombre'];
                    $_SESSION['id_rol']=$row['rol'];
                    $_SESSION['correo']=$row['correo'];
                }

		       $this->bd = null;
                return true;
            } else {
				$this->bd = null;
                return false;
            }
        }

    } // fin autentica

    // metodo para verificar que dentro del arreglo global $_SESSION existe el nombre del usuario
    public function verificar_usuario()
    {
        //comprobar la existencia del usuario
        if ( $_SESSION['user'] ) {
            return true;
        } else {
            header('Location:../index.php');
        }
    }


        private function md5_2($valor)
        {
            $m1 = md5($valor);
            $m2 = md5($m1);
            return $m2;
        }
    
} // fin clase
