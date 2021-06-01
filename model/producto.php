<?php
    include_once "class.db.php";

  @session_start();
  if(!isset($_SESSION['user'])){
    header('location:../login');
  }


    class Producto{

    public function __construct(){
        $db = New DB();
        $this->bd = $db->conecta();  
    }


    //LISTADO DE PRODUCTOS
    public function listaProductos(){
        $sql = "SELECT * FROM dicama.producto
                INNER JOIN dicama.inventario ON producto.cod_prod=inventario.cod_prod
                INNER JOIN dicama.subcategorias ON producto.ID_sub=subcategorias.ID_subcat
                INNER JOIN dicama.categoria ON subcategorias.ID_cat=categoria.ID_cat";

        $eje_new2 = $this->bd->prepare($sql);
        if ($eje_new2->execute()){
            $rowR = $eje_new2->fetchAll();
            return $rowR;
        }
    }

    public function nuevoProducto($codigo, $descripcion, $serie, $existencia, $precio_general, $precio_mayoreo, $subcategoria, $imagen, $precio_costo, $minimo){

        try{

            $this->bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->bd->beginTransaction();

            $sql = "INSERT INTO producto(cod_prod, img, serie, precio_costo, precio_gen, precio_may, ID_sub) 
            values ($codigo, '$imagen', '$serie', $precio_costo, $precio_general, $precio_mayoreo, $subcategoria)";

            $this->bd->exec($sql);

            $sql2 = "INSERT INTO inventario(cod_prod, descripcion, existencias, minimo) 
            values ($codigo, '$descripcion', $existencia, $minimo)";

            $this->bd->exec($sql2); 
            
            $usuario = $_SESSION['id_user'];
            $total = $precio_costo * $existencia;
            $exis_precio_costo = (0 + ($precio_costo * $existencia))/$existencia;
            $exis_total = 0 + ($precio_costo * $existencia);

            $sql3 = "INSERT INTO historial_producto(cod_prod, ID_us, detalle, tipo, clase, habia, cantidad, precio_costo, total, exis_cantidad, exis_precio_costo, exis_total, created_at) 
                     VALUES ($codigo, $usuario, 'Alta Producto', 'Entrada', 'Normal', 0, $existencia, $precio_costo, $total, $existencia, $exis_precio_costo, $exis_total, now())";

            $this->bd->exec($sql3); 

            $this->bd->commit();
            return true;
        }catch(Exception $e){
            $this->bd->rollback();
            return false;
        }
        
    }

    public function historial($codigo) {

        $sql = "SELECT * FROM historial_producto
                WHERE cod_prod=$codigo";

        $eje_new2 = $this->bd->prepare($sql);
        if ($eje_new2->execute()){
            $rowR = $eje_new2->fetchAll();
            return $rowR;
        }

    }

    public function producto($codigo){
        $sql = "SELECT * FROM dicama.producto
        INNER JOIN dicama.inventario ON producto.cod_prod=inventario.cod_prod
        INNER JOIN dicama.subcategorias ON producto.ID_sub=subcategorias.ID_subcat
        INNER JOIN dicama.categoria ON subcategorias.ID_cat=categoria.ID_cat
        WHERE producto.cod_prod=$codigo";

        $eje_new2 = $this->bd->prepare($sql);
        if ($eje_new2->execute()){
            $rowR = $eje_new2->fetchAll();
            return $rowR[0];
        }
    }

    public function modificarProducto_compra($codigo, $existencia, $agregado, $precio_costo, $precio_general, $precio_mayoreo, $factura, $precio_costo_anterior){
        try{
            $usuario = $_SESSION['id_user'];

            $this->bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->bd->beginTransaction();

            $total = $existencia + $agregado;
            $total_costo = $agregado * $precio_costo;
            $sql = "SELECT exis_total FROM historial_producto WHERE cod_prod=$codigo";

            $eje_new2 = $this->bd->prepare($sql);
            $eje_new2->execute();
            $total_existencia = $eje_new2->fetchAll();

            $exis_precio_costo = ($total_existencia[0]['exis_total'] + ($precio_costo * $agregado))/$total; 
            $exis_total = $total_existencia[0]['exis_total'] + ($precio_costo * $agregado);

            $sql = "UPDATE producto SET 
                        precio_costo = '$precio_costo', 
                        precio_gen = '$precio_general', 
                        precio_may = '$precio_mayoreo' 
                        WHERE cod_prod = '$codigo'";
            
            $this->bd->exec($sql); 

            $sql2 = "UPDATE inventario SET 
                        existencias =  $total;
                        WHERE cod_prod = '$codigo'";

            $this->bd->exec($sql2); 

            $sql3 = "INSERT INTO historial_producto(cod_prod, 
                                                    ID_us, 
                                                    detalle,
                                                    tipo, 
                                                    clase, 
                                                    habia, 
                                                    cantidad, 
                                                    precio_costo, 
                                                    total,
                                                    exis_cantidad, 
                                                    exis_precio_costo, 
                                                    exis_total, 
                                                    created_at
                                                ) VALUES (
                                                    $codigo, 
                                                    $usuario, 
                                                    'Compra Producto', 
                                                    'Entrada',
                                                    'normal',
                                                    $existencia, 
                                                    $agregado,
                                                    $precio_costo, 
                                                    $total_costo,
                                                    $total,
                                                    $exis_precio_costo,
                                                    $exis_total, 
                                                    now()
                                                )";
            $this->bd->exec($sql3); 

            $this->bd->commit();
            return true;
        }catch(Exception $e){
            $this->bd->rollback();
            return false;
        } 
    }

    
} // fin clase
