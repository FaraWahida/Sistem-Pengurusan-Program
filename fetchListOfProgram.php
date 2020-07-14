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
 SELECT program.KodProgram, kelab.NamaKelab, program.NamaProgram, program.BilanganTerhad, program.TarikhProgram, program.ButiranProgram FROM program, kelab, pelajar WHERE (program.KodProgram LIKE '%$search_query%' 
 OR kelab.NamaKelab LIKE '%$search_query%' 
 OR program.NamaProgram LIKE '%$search_query%' 
 OR program.BilanganTerhad LIKE '%$search_query%' 
 OR program.TarikhProgram LIKE '%$search_query%' 
 OR program.ButiranProgram LIKE '%$search_query%') AND kelab.IdKelab = program.KodKelab AND program.IdPelajar= pelajar.IdPelajar AND program.IdPelajar ='" . $username . "'";
}
else
{
 $query = "SELECT program.KodProgram, kelab.NamaKelab, program.NamaProgram, program.BilanganTerhad, program.TarikhProgram, program.ButiranProgram FROM program, kelab, pelajar WHERE kelab.IdKelab = program.KodKelab AND program.IdPelajar= pelajar.IdPelajar AND program.IdPelajar ='" . $username . "'";
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