<?php


class Base
{
    private $host;
    private $usuario;
    private $pass;
    private $bd;
    private $port;

    public function __construct($host, $usuario, $pass, $bd, $port)
    {
        $this->host = $host;
        $this->usuario = $usuario;
        $this->pass = $pass;
        $this->bd = $bd;
        $this->port = $port;
    }

    public function conectarADB(){
        $datos=mysqli_connect($this->host,$this->usuario,$this->pass,$this->bd,$this->port);
        if(!$datos)
            return false;
        return $datos;
    }

    public function registrarUsuario($nombre,$apellido,$usuario,$pass){
        $conectar=$this->conectarADB();
        // Convierte la pass ingresada en una encriptada
        $encriptada=password_hash($pass,PASSWORD_BCRYPT);
        if(!$conectar)
            return false;
        $query="insert into `registro` values (DEFAULT,'$nombre','$apellido','$usuario','$encriptada')";
        if (mysqli_query($conectar,$query))
            return true;
        return false;
    }

    public function usuarioCorrecto($usuario){
        $conectar=$this->conectarADB();
        if(!$conectar)
            return false;
        $query="select `registro`.`usuario` from `registro` where `usuario`='$usuario'";
        $registro=mysqli_query($conectar,$query);
        $res=mysqli_fetch_array($registro);
        if($res)
            return true;
        return false;
    }


    public function contraseniaCorrecta($usuario,$pass){
        $conectar=$this->conectarADB();
        if(!$conectar)
            return false;
        $query="select `registro`.`pass` from `registro` where `usuario`='$usuario'";
        $registro=mysqli_query($conectar,$query);
        $res=mysqli_fetch_array($registro); // Trae la pass
        if($res) {
            if(password_verify($pass,$res['pass'])) // Compara la pass ingresada con la pass guardada
                return true;
            return false;
        }
        return false;
    }
}