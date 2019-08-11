<?php
class Productos
{
	private $idProducto;
	private $idProveedor;
	private $marca;
	private $genero;
	private $precio;
	private $color;
	private $descripcion;
	private $Conexion;
	
	public function setIdProducto($idProducto)
	{
		$this->idProducto=$idProducto;
	}
	
	public function getIdProducto()
	{
		return ($this->idProducto);
	}
	
	public function setIdProveedor($idProveedor)
	{
		$this->idProveedor=$idProveedor;
	}
	
	public function getIdProveedor()
	{
		return ($this->idProveedor);
	}
	
	public function setMarca($marca)
	{
		$this->marca=$marca;
	}
	
	public function getMarca()
	{
		return ($this->marca);
	}
	
	public function setGenero($genero)
	{
		$this->genero=$genero;
	}
	
	public function getGenero()
	{
		return ($this->genero);
	}
	
	public function setPrecio($precio)
	{
		$this->precio=$precio;
	}
	
	public function getPrecio()
	{
		return ($this->precio);
	}

	public function setColor($color)
	{
		$this->color=$color;
	}
	
	public function getColor()
	{
		return ($this->color);
	}
	
	
	
	public function crearProducto($idProducto,$idProveedor,$marca,$genero,$precio,$color,$descripcion)
	{
		$this->idProducto=$idProducto;
		$this->idProveedor=$idProveedor;
		$this->marca=$marca;
		$this->genero=$genero;
		$this->precio=$precio;
		$this->color=$color;
		$this->descripcion=$descripcion;		
	}
	
	public function agregarProducto()
	{	
		$this->Conexion=Conectarse();
		$sql="INSERT INTO producto(prodid,provid,prodmarca,prodgenero,prodprecio,prodcolor,prodescripcion)
        values ('$this->idProducto','$this->idProveedor','$this->marca','$this->genero','$this->precio','$this->color','$this->descripcion')";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}
	
	public function modificarProducto()
	{	
		$this->Conexion=Conectarse();
		$sql="UPDATE producto SET prodid='$this->idProducto',provid='$this->idProveedor',prodmarca='$this->marca',prodgenero='$this->genero',prodprecio='$this->precio',prodcolor='$this->color',prodescripcion='$this->descripcion' WHERE prodid = '$_POST[prodid]'";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}

	public function eliminarProducto(){
		$this->Conexion=Conectarse();
		$sql = "DELETE FROM producto WHERE prodid = '$_GET[prodid]' ";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;
	}

	public function consultarProducto(){
		$this->Conexion=Conectarse();
		$sql = "SELECT * FROM producto";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;
	}

	public function consultarProductoDama(){
		$this->Conexion=Conectarse();
		$sql = "SELECT * FROM producto WHERE prodgenero='femenino'";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;
	}

	public function consultarProductoCaballero(){
		$this->Conexion=Conectarse();
		$sql = "SELECT * FROM producto WHERE prodgenero='Masculino'";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;
	}

	public function consultarIdProducto(){
		$this->Conexion=Conectarse();
		$sql = "SELECT * FROM producto WHERE prodid='$_GET[id]'";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;
	}

	
}

?>