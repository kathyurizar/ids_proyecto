<?php
    /* ARCHIVO DE CONFIGURACION */



class DB {

    /**
     * Database conexion.
     *
     * @return \PDO instance
     */
    public function conecta()
    {
        global $dsn, $userBd, $passwordBd;
            // Servidor y nombre de base de datos
            $dsn = 'mysql:host=localhost;dbname=dicama';
            // usuario de la base de datos
            $userBd = "root";
            // contraseña de la base de datos
            $passwordBd = "";
        try {
            $base = new PDO($dsn, $userBd, $passwordBd);
            return $base;
        } catch (Exception $e) {
            die('Error' . $e->getMessage());
        }
    }


    /**
     * Runs query and return fields.
     *
     * @param string $query
     * @return object
     */
    public function get($query = '')
    {
        if ($query == '') {
            return new \stdClass;
        }

        $pdo = $this->conecta();
        $sql = $pdo->prepare($query);
        $sql->execute();
        $fields = $sql->fetchAll(\PDO::FETCH_OBJ);

        return $fields;
    }

    /**
     * Runs query and return field.
     *
     * @param string $query
     * @return object
     */
    public function first($query = '')
    {
        if ($query == '') {
            return new \stdClass;
        }

        $pdo = $this->conecta();
        $sql = $pdo->prepare($query);
        $sql->execute();
        $fields = $sql->fetch(\PDO::FETCH_OBJ);

        return $fields;
    }

} // fin clase