<?php
require_once 'Conexion.php';

class Usuario extends Conexion
{
    public $usuario_id;
    public $usuario_nombre;
    public $usuario_correo;
    public $usuario_telefono;


    public function __construct($args = [])
    {
        $this->usuario_id = $args['usuario_id'] ?? null;
        $this->usuario_nombre = $args['usuario_nombre'] ?? '';
        $this->usuario_correo = $args['usuario_correo'] ?? '';
        $this->usuario_telefono = $args['usuario_telefono'] ?? '';
    }

    public function guardar()
    {
        $sql = "INSERT INTO usuario(usuario_nombre, usuario_correo, usuario_telefono) values('$this->usuario_nombre','$this->usuario_correo','$this->usuario_telefono')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar()
    {
        $sql = "SELECT * from usuario";

        if ($this->usuario_nombre != '') {
            $sql .= " and usuario_nombre like '%$this->usuario_nombre%' ";
        }

        if ($this->usuario_correo != '') {
            $sql .= " and usuario_correo like '%$this->usuario_correo%' ";
        }

        if ($this->usuario_telefono != '') {
            $sql .= " and usuario_telefono like '%$this->usuario_telefono%' ";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }
}