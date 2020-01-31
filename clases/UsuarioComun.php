<?php
class UsuarioComun{
    private $sexo;
    private $telefono;
    private $dni;
    private $fechaNacimiento;
    private $tarjeta;
    private $domicilio;
    private $carrito;
    private $facturas;
    private $foto;
    

    /**
     * Get the value of sexo
     */ 
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * Set the value of sexo
     *
     * @return  self
     */ 
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;

        return $this;
    }

    /**
     * Get the value of telefono
     */ 
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set the value of telefono
     *
     * @return  self
     */ 
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get the value of dni
     */ 
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * Set the value of dni
     *
     * @return  self
     */ 
    public function setDni($dni)
    {
        $this->dni = $dni;

        return $this;
    }

    /**
     * Get the value of fechaNacimiento
     */ 
    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }

    /**
     * Set the value of fechaNacimiento
     *
     * @return  self
     */ 
    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;

        return $this;
    }

    /**
     * Get the value of tarjeta
     */ 
    public function getTarjeta()
    {
        return $this->tarjeta;
    }

    /**
     * Set the value of tarjeta
     *
     * @return  self
     */ 
    public function setTarjeta($tarjeta)
    {
        $this->tarjeta = $tarjeta;

        return $this;
    }

    /**
     * Get the value of domicilio
     */ 
    public function getDomicilio()
    {
        return $this->domicilio;
    }

    /**
     * Set the value of domicilio
     *
     * @return  self
     */ 
    public function setDomicilio($domicilio)
    {
        $this->domicilio = $domicilio;

        return $this;
    }

    /**
     * Get the value of carrito
     */ 
    public function getCarrito()
    {
        return $this->carrito;
    }

    /**
     * Set the value of carrito
     *
     * @return  self
     */ 
    public function setCarrito($carrito)
    {
        $this->carrito = $carrito;

        return $this;
    }

    /**
     * Get the value of facturas
     */ 
    public function getFacturas()
    {
        return $this->facturas;
    }

    /**
     * Set the value of facturas
     *
     * @return  self
     */ 
    public function setFacturas($facturas)
    {
        $this->facturas = $facturas;

        return $this;
    }

    /**
     * Get the value of foto
     */ 
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * Set the value of foto
     *
     * @return  self
     */ 
    public function setFoto($foto)
    {
        $this->foto = $foto;

        return $this;
    }
}
?>