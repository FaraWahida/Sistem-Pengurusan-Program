<?php

//fetch.php

/*include('connection');
$connect=Connect();*/
$connect = new PDO("mysql:host=localhost;dbname=spp", "root", "");

$form_data = json_decode(file_get_contents("php://input"));

$query = '';
$data = array();

if(isset($form_data->search_query))
{
 $search_query = $form_data->search_query;
 $query = "
 SELECT IdPelajar, NamaPelajar, NomborTelefon FROM pelajar 
 WHERE (IdPelajar LIKE '%$search_query%' 
 OR NamaPelajar LIKE '%$search_query%' 
 OR NomborTelefon LIKE '%$search_query%') 
 AND IdKelab='0' AND Jawatan='PELAJAR' ORDER BY IdPelajar ASC";
}
else
{
 $query = "SELECT IdPelajar, NamaPelajar, NomborTelefon FROM pelajar WHERE IdKelab='0' AND Jawatan='PELAJAR' ORDER BY IdPelajar ASC";
}

$statement = $connect->prepare($query);

if($statement->execute())
{
 while($row = $statement->fetch(PDO::FETCH_ASSOC))
 {
  $data[] = $row;
 }
 echo json_encode($data);
}

?>