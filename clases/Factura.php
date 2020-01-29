<?php
class Factura{
    private $id;
    private $tipoFactura;
    private $direccion;
    private $tarjeta;
    private $envios;
    private $nroFactura;
    private $fecha;
    private $productos;
    private $total;
    private $usuario;


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nroFactura
     */ 
    public function getNroFactura()
    {
        return $this->nroFactura;
    }

    /**
     * Set the value of nroFactura
     *
     * @return  self
     */ 
    public function setNroFactura($nroFactura)
    {
        $this->nroFactura = $nroFactura;

        return $this;
    }

    /**
     * Get the value of fecha
     */ 
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set the value of fecha
     *
     * @return  self
     */ 
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get the value of productos
     */ 
    public function getProductos()
    {
        return $this->productos;
    }

    /**
     * Set the value of productos
     *
     * @return  self
     */ 
    public function setProductos($productos)
    {
        $this->productos = $productos;

        return $this;
    }

    /**
     * Get the value of total
     */ 
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set the value of total
     *
     * @return  self
     */ 
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get the value of tipoFactura
     */ 
    public function getTipoFactura()
    {
        return $this->tipoFactura;
    }

    /**
     * Set the value of tipoFactura
     *
     * @return  self
     */ 
    public function setTipoFactura($tipoFactura)
    {
        $this->tipoFactura = $tipoFactura;

        return $this;
    }

    /**
     * Get the value of direccion
     */ 
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set the value of direccion
     *
     * @return  self
     */ 
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

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
     * Get the value of envios
     */ 
    public function getEnvios()
    {
        return $this->envios;
    }

    /**
     * Set the value of envios
     *
     * @return  self
     */ 
    public function setEnvios($envios)
    {
        $this->envios = $envios;

        return $this;
    }

    /**
     * Get the value of usuario
     */ 
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set the value of usuario
     *
     * @return  self
     */ 
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }
}
?>