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


	$sthandler = $handler->prepare("SELECT * FROM clientes WHERE username = :nome");
	$sthandler->bindParam(':nome', $username);
	$sthandler->execute();
	$result = $sthandler->fetchAll();

	
        foreach($result as $row)
    {
echo "    <tr>";
echo "      <th >Nome: </th>";
echo "      <td>". $row['nome'] ."</td>";
echo "    </tr>";
echo "    <tr>";
echo "      <th >Morada: </th>";
echo "      <td>". $row['morada'] ."</td>";
echo "    </tr>";
echo "    <tr>";
echo "      <th >NIF: </th>";
echo "      <td>". $row['nif'] ."</td>";
echo "    </tr>";
echo "    <tr>";
echo "      <th >Telemóvel: </th>";
echo "      <td>". $row['telemovel'] ."</td>";
echo "    </tr>";
echo "    <tr>";
echo "      <th >Email: </th>";
echo "      <td>". $row['email'] ."</td>";
echo "    </tr>";
echo "    <tr>";
echo "      <th >País: </th>";
echo "      <td>". $row['pais'] ."</td>";
echo "    </tr>";
}

echo "  </tbody>";
echo " </table>";

?>