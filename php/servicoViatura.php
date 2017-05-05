<?php


session_start();
include 'db_const.php';

echo "<table class='table table-inverse'>";
echo "<tbody>";


class TableRows extends RecursiveIteratorIterator { 
    function __construct($it) { 
        parent::__construct($it, self::LEAVES_ONLY); 
    }

    function current() {
        return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() { 
        echo "<tr>"; 
    } 

    function endChildren() { 
        echo "</tr>" . "\n";
    } 
} 

if (!isset($_SESSION['login']) || $_SESSION["login"]==0) 
{
	header('Location:'.BASE_URL.'loginPage.php');
}



try {
    $handler = new PDO(DB_HOST,DB_USER, DB_PASSWORD);
    $handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){
    exit($e->getMessage());
}

	$matricula = filter_var($_POST['matricula'],FILTER_SANITIZE_STRING);   
	$username=$_SESSION['username'];


	$sthandler = $handler->prepare("SELECT fornecedorID FROM fornecedores WHERE username = :username");
	$sthandler->bindParam(':username', $username);
	$sthandler->execute();
	$result = $sthandler->fetchAll();
	foreach($result as $row)
		$fornecedorid=$row['fornecedorID'];
		
	
	$sthandler = $handler->prepare("SELECT viaturaID, fornecedorID FROM viatura WHERE matricula = :matricula");
	$sthandler->bindParam(':matricula', $matricula);
	$sthandler->execute();
	$result = $sthandler->fetchAll();
	
	foreach($result as $row){
		$viaturaid = $row['viaturaID'];
		$idfornecedor = $row['fornecedorID'];
	}
	if($idfornecedor==$fornecedorid){
		$sthandler = $handler->prepare("SELECT * FROM servico, clientes WHERE viaturaID = :viaturaid and servico.clienteID=clientes.clienteID");
		$sthandler->bindParam(':viaturaid', $viaturaid);
		$sthandler->execute();
		$result = $sthandler->fetchAll();
	
		foreach($result as $row)
		{
				echo "    <tr>";
				echo "      <th >Data: </th>";
				echo "      <td>". $row['data'] ."</td>";
				echo "    </tr>";
				echo "    <tr>";
				echo "      <th >Cliente: </th>";
				echo "      <td>". $row['nome']."</td>";
				echo "    </tr>";
				echo "    <tr>";
				echo "      <th >Origem: </th>";
				echo "      <td>". $row['origem'] ."</td>";
				echo "    </tr>";
				echo "    <tr>";
				echo "      <th >Destino: </th>";
				echo "      <td>". $row['destino'] ."</td>";
				echo "    </tr>";
				echo "    <tr>";
				echo "      <th >Distancia: </th>";
				echo "      <td>". $row['distancia'] ."</td>";
				echo "    </tr>";
				echo "    <tr>";
				echo "      <th >Custo: </th>";
				echo "      <td>". $row['custo'] ."</td>";
				echo "    </tr>";
		}
	}
echo "  </tbody>";
echo " </table>";

?>