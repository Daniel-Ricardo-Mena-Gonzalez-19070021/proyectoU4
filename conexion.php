<?php
echo "bienvenidos a conexiones con base de datos";
echo "<br>conectandonos via OBDC con DSN</br>";
$conexion = odbc_connect("baseprueba", "root","") or die(exit("error en la conexion"));

echo "<P>Conexion exitosa de BD por ODBC</P>";

$sql = "select * from accounts";

$resultados = odbc_exec($conexion,$sql) or die(exit("error al ejecutar la consulta"));

//generamos la tabla mediante odbc_result_all()
print odbc_result_all($resultados, "border=1");
echo "resgistros encontrados";

//Conexion sin odbs

$conex_msql = new mysqli("localhost", "root","","performance_schema",3306);
if($conex_msql->connect_errno)
{
    echo "error al conectarse al gestor MYSQL";
    echo "Error encontrado: " . $conex_msql->connect_error;

}
else echo "<br>Conexion exitosa a la base <p>". $conex_msql->host_info. "\n";
?>