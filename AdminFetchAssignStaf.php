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
 SELECT IdStaf, NamaStaf FROM staf WHERE(IdStaf LIKE '%$search_query%' OR NamaStaf LIKE '%$search_query%') AND Jawatan='LECTURER' ORDER BY IdStaf ASC";
}
else
{
 $query = "SELECT IdStaf, NamaStaf FROM staf WHERE Jawatan='LECTURER' ORDER BY IdStaf ASC";
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