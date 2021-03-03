<?php
    include_once 'connection.php';

    $recieved_data =json_decode(file_get_contents("php://input"));

    $data = array();

    if($recieved_data->action == 'fetchall')
    {
        $query = "
        SELECT * FROM policies 
        ORDER BY id ASC;
        ";

          $statement = $connect->prepare($query);
          $statement->execute();
          while($row = $statement->fetch(PDO::FETCH_ASSOC))
          {
              $data[] = $row;
          }
          echo json_encode($data);
    }
?>
