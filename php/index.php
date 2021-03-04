<?php
    include_once 'connection.php';

    $recieved_data =json_decode(file_get_contents("php://input"));

    $data = array();

    //SHOW ALL
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

    // Add record
    if($recieved_data->action == 'addrecord')
    {
        $customer_name = $recieved_data->customer_name;
        $customer_address = $recieved_data->customer_address;
        $premium = $recieved_data->premium;
        $policy_type = $recieved_data->policy_type;
        $insurer_name = $recieved_data->insurer_name;

        $query = "
        INSERT INTO 
        policies (customer_name,customer_address,premium,policy_type,insurer_name) 
        VALUES ('$customer_name','$customer_address','$premium','$policy_type','$insurer_name');
        ";
  
        $statement = $connect->prepare($query);
        $statement->execute();
        exit;
    }

?>
