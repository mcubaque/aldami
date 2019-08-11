<?php
class Proveedor
{
	private $idProveedor;
	private $proveedorNombre;
	private $proveedorContacto;
	private $proveedorTelefono;
	private $proveedorDireccion;
	
	
	
	
	
	public function crearProveedor($idProveedor,$proveedornombre,$proveedorContacto,$proveedorTelefono,$proveedorDireccion)
	{
		$this->idProveedor=$idProveedor;
		$this->proveedorNombre=$proveedornombre;
		$this->proveedorContacto=$proveedorContacto;
		$this->proveedorTelefono=$proveedorTelefono;
		$this->proveedorDireccion=$proveedorDireccion;
		
	}
	
	public function agregarProveedor()
	{	
		$this->Conexion=Conectarse();
		$sql="INSERT INTO proveedor(ProveeId,proveenombre,proveecargocontacto,proveetelefono,proveedireccion)
        VALUES ('$this->idProveedor','$this->proveedorNombre','$this->proveedorContacto','$this->proveedorTelefono','$this->proveedorDireccion')";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}
	
	public function modificarProveedor()
	{	
		$this->Conexion=Conectarse();
		$sql="UPDATE proveedor SET ProveeId='$this->idProveedor',proveenombre='$this->proveedorNombre',proveecargocontacto='$this->proveedorContacto',proveetelefono='$this->proveedorTelefono',proveedireccion='$this->proveedorDireccion' WHERE proveeId = '$_POST[ProveeId]'";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}	
	

	public function eliminarProveedor(){
		$this->Conexion=Conectarse();
		$sql = "DELETE FROM proveedor WHERE ProveeId = '$_GET[ProveeId]' ";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;
	}

	public function buscarProveedorVsProducto($buscarProveedorVsProducto){
		$this->Conexion=Conectarse();
		$sql = "SELECT prodmarca, prodgenero, prodprecio,proveenombre, proveecargocontacto, proveetelefono FROM proveedor INNER JOIN producto ON proveedor.Proveeid=producto.provid WHERE proveenombre like '%$buscarProveedorVsProducto%' or prodmarca like '%$buscarProveedorVsProducto%' or prodgenero like '%$buscarProveedorVsProducto%';";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;
	}

}

?>