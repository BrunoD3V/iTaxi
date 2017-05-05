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


$username=$_SESSION['username'];


	$sthandler = $handler->prepare("SELECT clienteID FROM clientes WHERE username = :nome");
	$sthandler->bindParam(':nome', $username);
	$sthandler->execute();
	$result = $sthandler->fetchAll();
	foreach($result as $row)
		$clienteid=$row['clienteID'];
		
		
	$sthandler = $handler->prepare("SELECT data, origem, destino, distancia, custo FROM servico WHERE clienteID = :clienteid");
	$sthandler->bindParam(':clienteid', $clienteid);
	$sthandler->execute();
	$result = $sthandler->fetchAll();
    foreach($result as $row)
    {
			echo "    <tr>";
			echo "      <th >Data: </th>";
			echo "      <td>". $row['data'] ."</td>";
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

echo "  </tbody>";
echo " </table>";

?>