<?php
class Clientes
{
	private $documento;
	private $nombre;
	private $apellido;
	private $email;
	private $direccion;
	private $fechaNac;
	private $ciudad;
	private $Conexion;
	
	public function setDocumento($documento)
	{
		$this->documento=$documento;
	}
	
	public function getDocumento()
	{
		return ($this->documento);
	}
	
	public function setNombre($nombre)
	{
		$this->nombre=$nombre;
	}
	
	public function getNombre()
	{
		return ($this->nombre);
	}

	public function setApellido($apellido)
	{
		$this->apellido=$apellido;
	}
	
	public function getApellido()
	{
		return ($this->apellido);
	}

	public function setEmail($email)
	{
		$this->email=$email;
	}
	
	public function getEmail()
	{
		return ($this->email);
	}
	
	public function setDireccion($direccion)
	{
		$this->direccion=$direccion;
	}
	
	public function getDireccion()
	{
		return ($this->direccion);
	}

	public function setFechaNac($fechaNac)
	{
		$this->fechaNac=$fechaNac;
	}
	
	public function getFechaNac()
	{
		return ($this->fechaNac);
	}

	public function setCiudad($ciudad)
	{
		$this->ciudad=$ciudad;
	}
	
	public function getCiudad()
	{
		return ($this->ciudad);
	}
	
	
	
	public function crearCliente($documento,$nombre,$apellido,$email,$direccion,$fechaNac,$ciudad)
	{
		$this->documento=$documento;
		$this->nombre=$nombre;
		$this->apellido=$apellido;
		$this->email=$email;
		$this->direccion=$direccion;
		$this->fechaNac=$fechaNac;
		$this->ciudad=$ciudad;		
	}
	
	public function agregarCliente()
	{	
		$this->Conexion=Conectarse();
		$sql="insert into cliente(clienumerodoc,clienombre,clieapellido,clieemail,cliedireccion,cliefechanacimiento,ciudad)
        values ('$this->documento','$this->nombre','$this->apellido','$this->email','$this->direccion','$this->fechaNac','$this->ciudad')";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}

	public function modificarCliente()
	{	
		$this->Conexion=Conectarse();
		$sql="update cliente set clienumerodoc='$this->documento',clienombre='$this->nombre',clieapellido='$this->apellido',clieemail='$this->email',cliedireccion='$this->direccion',cliefechanacimiento='$this->fechaNac',ciudad='$this->ciudad' where clienumerodoc = '$_POST[clienumerodoc]'";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}

	public function eliminarCliente(){
		$this->Conexion=Conectarse();
		$sql = "DELETE FROM cliente WHERE clienumerodoc = '$_GET[clienumerodoc]' ";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;
	}

	public function consultarCliente($documento)
	{
		$this->Conexion=Conectarse();
		$sql="select * from cliente where clienumerodoc='$documento'";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}

	public function agregarIdCliente($documento)
	{
		$this->Conexion=Conectarse();
		$sql="select * from cliente where clienumerodoc='$documento'";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}

}