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
 $query = " SELECT pelajar.IdPelajar, pelajar.NamaPelajar, pelajar.NomborTelefon, pelajar.Jawatan, kelab.NamaKelab FROM pelajar, kelab WHERE (pelajar.IdPelajar LIKE '%$search_query%'
 OR pelajar.NamaPelajar LIKE '%$search_query%'  
 OR pelajar.Jawatan LIKE '%$search_query%' 
 OR kelab.NamaKelab LIKE '%$search_query%') AND pelajar.IdKelab = kelab.IdKelab ORDER BY pelajar.IdPelajar ASC";
 
}
else
{
 $query = "SELECT pelajar.IdPelajar, pelajar.NamaPelajar, pelajar.NomborTelefon, pelajar.Jawatan, kelab.NamaKelab FROM pelajar, kelab WHERE pelajar.IdKelab = kelab.IdKelab ORDER BY pelajar.IdPelajar ASC";
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