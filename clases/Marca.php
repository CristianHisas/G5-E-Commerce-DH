<?php

    class Marca
    {
        private $id_marca;
        private $marca;

        public function listarMarcas()
        {
            $link = Conexion::conectar();
        try{
            $sql = "SELECT id_marca, marca
                        FROM marcas";
            $stmt = $link->prepare($sql);
            $stmt->execute();
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (\Exception $e) {
            echo "Error al obtener Lista de Marcas";
            $e->getMessage();
          }  
        }           

        public function verMarcaPorID($id_marca)
	{	
        try{
            $link = Conexion::conectar();            
            $sql = "SELECT * FROM marcas WHERE id_marca='$id_marca'";
            $stmt = $link->prepare($sql);           
            $stmt->execute();
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);            
            return $resultado;

        } catch(\PDOException $e){
            return null;
           }
           catch(\PDOStatement $e){
                return null;
           }
           catch (\Exception $e) 
           {
             
            die($e->getMessage());
            return null; 
           }
           
    }

        public function agregarMarca()
        {
            $marca = $_POST['marca'];
            $link = Conexion::conectar();
            $sql = "INSERT INTO marcas
                        VALUES
                            ( default, :marca )";
            $stmt = $link->prepare($sql);
            $stmt->bindParam(':marca', $marca, PDO::PARAM_STR);

            if( $stmt->execute() ){
                $this->setid_marca($link->lastInsertId());
                $this->setmarca($marca);
                return true;
            }
            return false;

        }     

        public function modificarMarca()
        {
            $id = $_POST['id_marca'];
            $marca = $_POST['marca'];
            $link = Conexion::conectar();
            $sql = "UPDATE marcas SET marca='$marca' WHERE id_marca='$id'";
            $stmt = $link->prepare($sql);

            if( $stmt->execute() ){
                $this->setid_marca($link->lastInsertId());
                $this->setmarca($marca);
                return true;
            }
            return false;
        }         




        public function eliminarMarca()      
        {
            try
            {
            $id = $_REQUEST['id']; 
            $link = Conexion::conectar();
            $sql = "DELETE FROM marcas WHERE id_marca=?";
            $stmt = $link->prepare($sql);

            if( $stmt->execute(array($id)) ){
               // $this->setid_marca($link->lastInsertId());
               // $this->setmarca($marca);
                              
            }
            
           } 
           catch(\PDOException $e){
            return False;
           }
           catch(\PDOStatement $e){
                return False;
           }
           catch (\Exception $e) 
           {
             
            die($e->getMessage());
            return false; 
           }
           return true; 
           }

        /**
         * @return mixed
         */
        public function getId_marca()
        {
            return $this->id_marca;
        }

        /**
         * @param mixed $id_marca
         */
        public function setId_marca($id_marca)
        {
            $this->id_marca = $id_marca;
        }

        /**
         * @return mixed
         */
        public function getMarca()
        {
            return $this->marca;
        }

        /**
         * @param mixed $marca
         */
        public function setMarca($marca)
        {
            $this->marca = $marca;
        }  
    }      