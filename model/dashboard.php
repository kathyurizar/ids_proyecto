<?php
    include_once "class.db.php";

  @session_start();
  if(!isset($_SESSION['user'])){
    header('location:../login');
  }


    class Dashboard{

    public function __construct(){
        $db = New DB();
        $this->bd = $db->conecta();
    }

    public function equiposActivos(){
        $empresa = $_SESSION['id_empresa'];

        $query="SELECT count(cod_maquina_equipo) as equipos_activos FROM maquinas_equipos where cod_empresa='$empresa' and estado='A'";

        $query = $this->bd->prepare($query);
        $query->execute();
        $lista = $query->fetchAll();
        return $lista[0]['equipos_activos'];
    }

    public function tecnicosActivos(){
        $empresa = $_SESSION['id_empresa'];

        $query="SELECT count(cod_tecnico) as tecnicos_activos FROM tecnicos where cod_empresa='$empresa' and estado='A'";

        $query = $this->bd->prepare($query);
        $query->execute();
        $lista = $query->fetchAll();
        return $lista[0]['tecnicos_activos'];
    }

    public function totalFacturadoAnio(){
        $empresa = $_SESSION['cod_cliente'];

        $query="SELECT ISNULL(SUM((T1.Quantity*(CASE T1.Currency WHEN 'USD' THEN T1.PriceAfVAT*T1.Rate WHEN 'QTZ' THEN T1.PriceAfVAT END))-isnull(T3.Quantity,0)*isnull((CASE T3.Currency WHEN 'USD' THEN T3.PriceAfVAT*T3.Rate WHEN 'QTZ' THEN T3.PriceAfVAT END),0)),0) AS total
        FROM $this->b..DLN1 T1
        INNER JOIN $this->b..ODLN T2 ON T2.DocEntry=T1.DocEntry
        LEFT JOIN $this->b..RDN1 T3 ON T3.BaseEntry=T1.DocEntry AND T3.BaseLine=T1.LineNum
        INNER JOIN servicio_consumo_enca T4 ON T4.docEntrySAP_entrega=T2.DocEntry
        WHERE T2.CardCode='$empresa'  AND T2.CANCELED='N'
        AND T2.DocDate BETWEEN CONVERT(VARCHAR,YEAR(GETDATE()))+'-'+Replace ( str ( month(getdate()), 2), ' ', '0' )+'-01' AND CONVERT(DATE,GETDATE())";

        $query = $this->bd->prepare($query);
        $query->execute();
        $lista = $query->fetchAll();
        return $lista[0]['total'];
    }
 
    public function detalleRepuestos(){
        $empresa = $_SESSION['cod_cliente'];

        $query="SELECT TOP 10 AA.cantidad,AA.ItemCode,AA.numeroParte,AA.ItemName,AA.FacturadoQ FROM (
            SELECT SUM(T1.Quantity-ISNULL(T5.Quantity,0)) AS cantidad,
                                T1.ItemCode,ISNULL(T2.U_codigo_anterior,'') AS numeroParte,
                                T2.ItemName,
                                CONVERT(NUMERIC(19,2),
                                SUM((T1.Quantity-ISNULL(T5.Quantity,0))*(CASE T1.Currency WHEN 'USD' THEN T1.PriceAfVAT*T1.Rate WHEN 'QTZ' THEN T1.PriceAfVAT END))) AS FacturadoQ 
                            FROM $this->b..DLN1 T1 
                            INNER JOIN $this->b..OITM T2 ON T2.ItemCode=T1.ItemCode
                            INNER JOIN $this->b..ODLN T3 ON T3.DocEntry=T1.DocEntry
                            INNER JOIN servicio_consumo_enca T4 ON T4.docEntrySAP_entrega=T3.DocEntry
                            LEFT JOIN $this->b..RDN1 T5 ON T5.BaseEntry=T1.DocEntry AND T5.BaseLine=T1.LineNum
                            WHERE T3.CardCode='$empresa' AND T3.CANCELED='N' AND SUBSTRING(T1.ItemCode,1,2)='PA'
                                AND T3.DocDate BETWEEN CONVERT(VARCHAR,YEAR(GETDATE()))+'-'+Replace ( str ( month(getdate()), 2), ' ', '0' )+'-01' 
                                AND CONVERT(DATE,GETDATE())
                            GROUP BY T1.ItemCode,
                                ISNULL(T2.U_codigo_anterior,''),
                                T2.ItemName
                                ) AA
                            ORDER BY AA.FacturadoQ DESC";

        $query = $this->bd->prepare($query);
        $query->execute();
        $lista = $query->fetchAll();
        return $lista;
    }
    
} // fin clase
