<?php
class Usuarios
{
	private $idUsuario;
	private $email;
	private $password;
	private $tipoUsuario;
	private $Conexion;
	
	public function setIdUsuario($idUsuario)
	{
		$this->idUsuario=$idUsuario;
	}
	
	public function getIdUsuario()
	{
		return ($this->idUsuario);
	}
	
	public function setEmail($email)
	{
		$this->email=$email;
	}
	
	public function getEmail()
	{
		return ($this->email);
	}
	
	public function setPassword($password)
	{
		$this->password=$password;
	}
	
	public function getPassword()
	{
		return ($this->password);
	}

	public function setTipoUsuario($tipoUsuario)
	{
		$this->tipoUsuario=$tipoUsuario;
	}
	
	public function getTipoUsuario()
	{
		return ($this->tipoUsuario);
	}
	
	
	
	public function crearUsuario($idUsuario,$email,$password,$tipoUsuario)
	{
		$this->idUsuario=$idUsuario;
		$this->email=$email;
		$this->password=$password;
		$this->tipoUsuario=$tipoUsuario;		
	}
	
	public function agregarUsuario()
	{	
		$this->Conexion=Conectarse();
		$sql="insert into usuarios(id_usuario,email,password, tipo_usuario)
        values ('$this->idUsuario','$this->email','$this->password','$this->tipoUsuario')";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}

	public function modificarUsuario()
	{	
		$this->Conexion=Conectarse();
		$sql="update usuarios set id_usuario='$this->idUsuario',email='$this->email',password='$this->password',tipo_usuario='$this->tipoUsuario' where id_usuario = '$_POST[id_usuario]'";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}

	public function eliminarUsuario(){
		$this->Conexion=Conectarse();
		$sql = "DELETE FROM usuarios WHERE id_usuario = '$_GET[id_usuario]' ";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;
	}

}