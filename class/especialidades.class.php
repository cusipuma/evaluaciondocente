<?php
class Especialidades{

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

	public function ListarEspecialidades(){
		try{
			$consulta = $this->conexion->prepare("call spu_especialidades_listar()");
			$consulta->execute();
			return $consulta->fetchAll();
			$this->conexion = null;
		}
		catch(PDOException $e){
			$e->getMessage();
		}
	}
}
?>