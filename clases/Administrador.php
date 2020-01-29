<?php
    class Administrador extends Usuario{
        public function obtenerListaAdministradores(){
            $db=Conexion::conectar();
            //try {
              $sql = "SELECT id_usuario as id,user as usuario,nombre,apellido,email,contrasenia as contrasenia,estado as estado 
                FROM usuarios as u inner join estados as e on  u.id_estado=e.id_estado "
                //where id_tipo_de_usuario= 1 "
                ;
              $stmt = $db->prepare($sql);
              $stmt->execute();
              //$variable = $stmt->fetchAll(PDO::FETCH_ASSOC);//array asociado
              $variable = $stmt->fetchAll(PDO::FETCH_CLASS,"Administrador");//objeto
              return $variable;  
            //} catch (\Exception $e) {
            //  echo "Error al obtener Lista de Administradores";
            //  $e->getMessage();
            //  return false;
            //}
            
          }
          public function borrarAdministrador($id)
          {
            $db=Conexion::conectar();
            try
            {
        
              $statement = $db->prepare("DELETE FROM usuarios WHERE id_producto = :id");
        
              $statement->bindValue(":id", $id);
        
              $statement->execute();
        
            }
            catch (\Exception $e)
            {
                echo "Error al borrar producto";
                $e->getMessage();
            }
        
          }
        public function agregarAlListado(){
            return false;
        }
        public function eliminarUsuario(){
            return false;
        }
        public function modificarProducto(){}

    }
?>