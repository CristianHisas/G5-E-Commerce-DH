
<?php
    class Categoria
    {
        private $id_categoria;
        private $categoria;

        public function listarcategorias()
        {
        $link = Conexion::conectar();
        try {
            $sql = "SELECT id_categoria, categoria
                        FROM categorias";
            $stmt = $link->prepare($sql);
            $stmt->execute();
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            return $resultado;
        } catch (\Exception $e) {
            echo "Error al obtener Lista de Categorias";
            $e->getMessage();
          }
        }

        public function verCategoriaPorID($id_categoria)
        {
        try{
            $link = Conexion::conectar();
            $sql = "SELECT * FROM categorias WHERE id_categoria='$id_categoria'";
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

        public function agregarCategoria()
        {
            $categoria = $_POST['categoria'];
            $link = Conexion::conectar();
            $sql = "INSERT INTO categorias
                        VALUES
                            ( default, :categoria )";
            $stmt = $link->prepare($sql);
            $stmt->bindParam(':categoria', $categoria, PDO::PARAM_STR);

            if( $stmt->execute() ){
                $this->setId_categoria($link->lastInsertId());
                $this->setCategoria($categoria);
                return true;
            }
            return false;

        }

        public function modificarCategoria()
        {
            $id = $_POST['id_categoria'];
            $categoria = $_POST['categoria'];
            $link = Conexion::conectar();
            $sql = "UPDATE categorias SET categoria='$categoria' WHERE id_categoria='$id'";
            $stmt = $link->prepare($sql);

            if( $stmt->execute() ){
                $this->setid_categoria($link->lastInsertId());
                $this->setcategoria($categoria);
                return true;
            }
            return false;

        }

        public function eliminarCategoria()
        {
            try
            {
            $id = $_REQUEST['id'];
            $link = Conexion::conectar();
            $sql = "DELETE FROM categorias WHERE id_Categoria=?";
            $stmt = $link->prepare($sql);

            if( $stmt->execute(array($id)) ){
               // $this->setid_Categoria($link->lastInsertId());
               // $this->setCategoria($Categoria);
            }
           }catch(\PDOException $e){
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
        public function getId__categoria()
        {
            return $this->id_categoria;
        }

        /**
         * @param mixed $id_categoria
         */
        public function setId_categoria($id_categoria)
        {
            $this->id_categoria = $id_categoria;
        }

        /**
         * @return mixed
         */
        public function getCategoria()
        {
            return $this->categoria;
        }

        /**
         * @param mixed $categoria
         */
        public function setCategoria($categoria)
        {
            $this->categoria = $categoria;
        }



    }
