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


	$sthandler = $handler->prepare("SELECT fornecedorID FROM fornecedores WHERE username = :username");
	$sthandler->bindParam(':username', $username);
	$sthandler->execute();
	$result = $sthandler->fetchAll();
	foreach($result as $row)
		$fornecedorid=$row['fornecedorID'];
		
		
	$sthandler = $handler->prepare("SELECT viaturaID FROM viatura WHERE fornecedorID = :fornecedorid");
	$sthandler->bindParam(':fornecedorid', $fornecedorid);
	$sthandler->execute();
	$result = $sthandler->fetchAll();
	$contador = 0;
	$media = 0;
	$soma = 0;
	foreach($result as $row){
		$viaturaid = $row['viaturaID'];
		$sthandler1 = $handler->prepare("SELECT motoristaID, viaturaID, dia FROM motorista_viatura WHERE viaturaID = :viaturaid");
		$sthandler1->bindParam(':viaturaid', $viaturaid);
		$sthandler1->execute();
		$result1 = $sthandler1->fetchAll();
		
		foreach($result1 as $row){
			$viaturaid = $row['viaturaID'];
			$motoristaid=$row['motoristaID'];
			$dia = $row['dia'];
			$sthandler2 = $handler->prepare("SELECT avaliacao FROM servico WHERE viaturaID = :viaturaid and dia = :dia");
			$sthandler2->bindParam(':viaturaid', $viaturaid);
			$sthandler2->bindParam(':dia', $dia);
			$sthandler2->execute();
			$result2 = $sthandler1->fetchAll();
			print_r($result2);
			foreach($result2 as $row){
				$avaliacao = $row['avaliacao'];
				$contador++;
				$soma+=$avaliacao;				
			}
			
		}
	}
echo "  </tbody>";
echo " </table>";

?>