<?php
class Tarjeta{
    private $id_tarjeta;
    private $id_tipo_tarjeta;
    private $nombre;
    private $numeroTarjeta;
    private $tipoTarjeta;
    private $cvc;
    private $fecha_vencimiento;

    /**
     * Get the value of id_tarjeta
     */ 
    public function getId_tarjeta()
    {
        return $this->id_tarjeta;
    }

    /**
     * Set the value of id_tarjeta
     *
     * @return  self
     */ 
    public function setId_tarjeta($id_tarjeta)
    {
        $this->id_tarjeta = $id_tarjeta;

        return $this;
    }

    /**
     * Get the value of id_tipo_tarjeta
     */ 
    public function getId_tipo_tarjeta()
    {
        return $this->id_tipo_tarjeta;
    }

    /**
     * Set the value of id_tipo_tarjeta
     *
     * @return  self
     */ 
    public function setId_tipo_tarjeta($id_tipo_tarjeta)
    {
        $this->id_tipo_tarjeta = $id_tipo_tarjeta;

        return $this;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of numeroTarjeta
     */ 
    public function getNumeroTarjeta()
    {
        return $this->numeroTarjeta;
    }

    /**
     * Set the value of numeroTarjeta
     *
     * @return  self
     */ 
    public function setNumeroTarjeta($numeroTarjeta)
    {
        $this->numeroTarjeta = $numeroTarjeta;

        return $this;
    }

    /**
     * Get the value of tipoTarjeta
     */ 
    public function getTipoTarjeta()
    {
        return $this->tipoTarjeta;
    }

    /**
     * Set the value of tipoTarjeta
     *
     * @return  self
     */ 
    public function setTipoTarjeta($tipoTarjeta)
    {
        $this->tipoTarjeta = $tipoTarjeta;

        return $this;
    }

    /**
     * Get the value of cvc
     */ 
    public function getCvc()
    {
        return $this->cvc;
    }

    /**
     * Set the value of cvc
     *
     * @return  self
     */ 
    public function setCvc($cvc)
    {
        $this->cvc = $cvc;

        return $this;
    }

    /**
     * Get the value of fecha_vencimiento
     */ 
    public function getFecha_vencimiento()
    {
        return $this->fecha_vencimiento;
    }

    /**
     * Set the value of fecha_vencimiento
     *
     * @return  self
     */ 
    public function setFecha_vencimiento($fecha_vencimiento)
    {
        $this->fecha_vencimiento = $fecha_vencimiento;

        return $this;
    }
}
?>