<?php
class Empleado
{
	private $idEmpleado;
	private $empleadoNombre;
	private $empleadoApellido;
	private $empleadoCargo;
	private $empleadoEmail;
	private $empleadoTelefono;
	
	
	public function crearEmpleado($idEmpleado,$empleadoNombre,$empleadoApellido,$empleadoCargo,$empleadoEmail,$empleadoTelefono)
	{
		$this->idEmpleado=$idEmpleado;
		$this->empleadoNombre=$empleadoNombre;
		$this->empleadoApellido=$empleadoApellido;
		$this->empleadoCargo=$empleadoCargo;
		$this->empleadoEmail=$empleadoEmail;
		$this->empleadoTelefono=$empleadoTelefono;
	}
	
	public function agregarEmpleado()
	{	
		$this->Conexion=Conectarse();
		$sql="INSERT INTO empleado(emplenumerodoc,emplenombre,empleapellido,emplecargo,empleemail, empletelefono)
        VALUES ('$this->idEmpleado','$this->empleadoNombre','$this->empleadoApellido','$this->empleadoCargo','$this->empleadoEmail','$this->empleadoTelefono')";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}
	
	public function modificarEmpleado()
	{	
		$this->Conexion=Conectarse();
		$sql="UPDATE empleado SET emplenumerodoc='$this->idEmpleado',emplenombre='$this->empleadoNombre',empleapellido='$this->empleadoApellido',emplecargo='$this->empleadoCargo',empleemail='$this->empleadoEmail',empletelefono='$this->empleadoTelefono' WHERE emplenumerodoc = '$_POST[emplenumerodoc]'";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}	
	

	public function eliminarEmpleado(){
		$this->Conexion=Conectarse();
		$sql = "DELETE FROM empleado WHERE emplenumerodoc = '$_GET[idEmpleado]' ";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;
	}

}

?>