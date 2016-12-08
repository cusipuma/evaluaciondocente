<?php
class Docentes{

	//Atributos de clase
	private static $instancia;	//Singleton
	private $conexion;			//Conexión a MySQL

	//Método constructor
	public function __construct(){
		try	{
			//Conexión al servidor y a la BD
			$this->conexion = new PDO("mysql:host=127.0.0.1;dbname=minedu","root","");
			
			//Codificación de caracteres
			$this->conexion->exec("SET CHARACTER SET utf8");

			//Configurando el PDO (Opcional)
			$this->conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$this->conexion->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);

		}
		catch (PDOException $e) {
			print "Error: " . $e.getMessage();
		}
	}

	//Singleton :D
	// ¡Una sola instancia permitida!
	public static function singleton(){
		//Verificamos que NO exista la instancia
		//para poder crear una.
		if (!isset(self::$instancia)){
			$miclase = __CLASS__;
			self::$instancia = new $miclase;
		}

		return self::$instancia;
	}


	//Método que impide dos o más instancias
	public function __clone(){
		trigger_error("No está permitido otra instancia" , E_USER_ERROR);
	}

	public function ListarDocentes(){
		try{
			$consulta = $this->conexion->prepare("call spu_docentes_listar()");
			$consulta->execute();
			return $consulta->fetchAll();
			$this->conexion = null;
		}
		catch(PDOException $e){
			$e->getMessage();
		}
	}

	public function Registrar($idie, $idespecialidad){
		try{
			$consulta = $this->conexion->prepare("call spu_docentes_registrar(?,?)");

			$consulta->bindParam(1,$idie);
			$consulta->bindParam(2,$idespecialidad);

			$consulta->execute();

			$this->conexion = null;
		}
		catch(PDOException $e){
			$e->getMessage();
		}
	}

	//Este método sirve de apoyo al método MODIFICAR
	public function ObtenerDatos($iddocente){
		try{
			$consulta = $this->conexion->prepare("call spu_docentes_devolver_datos(?)");

			$consulta->bindParam(1,$iddocente);
			$consulta->execute();

			return $consulta->fetch();
			$this->conexion = null;
		}
		catch(PDOException $e){
			$e->getMessage();
		}
	}
}
?>