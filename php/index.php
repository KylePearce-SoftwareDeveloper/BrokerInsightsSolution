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

    //Edit record
    // Update record
    if($recieved_data->action == 'editrecord'){
        $id = $recieved_data->id;
        $new_customer_name = $recieved_data->new_customer_name;
        $new_customer_address = $recieved_data->new_customer_address;
        $new_premium = $recieved_data->new_premium;
        $new_policy_type = $recieved_data->new_policy_type;
        $new_insurer_name = $recieved_data->new_insurer_name;
  
        $query = "
        UPDATE policies 
        SET customer_name='$new_customer_name', customer_address='$new_customer_address', premium='$new_premium', policy_type='$new_policy_type', insurer_name='$new_insurer_name'
        WHERE id='$id';
        ";
  
        $statement = $connect->prepare($query);
        $statement->execute();
        exit;
    }

    //Delete record
    if($recieved_data->action == 'deleterecord'){
        $id = $recieved_data->id;

        $query = "
        DELETE FROM policies 
        WHERE id = '$id';
        ";

        $statement = $connect->prepare($query);
        $statement->execute();
        exit;
    }

?>
