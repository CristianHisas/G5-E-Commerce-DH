<?php

    class Categoria
    {
        private $id_categoria;
        private $categoria;

        public function listarcategorias()
        {
            $link = Conexion::conectar();
            $sql = "SELECT id_categoria, categoria
                        FROM categorias";
            $stmt = $link->prepare($sql);
            $stmt->execute();
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        }

        public function verCategoriaPorID()
        {
            
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
            
        }

        public function eliminarCategoria()
        {

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