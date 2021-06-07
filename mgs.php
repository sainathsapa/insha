     
  <?php
  
  $apiKey = urlencode('pumoyhOgfUQ-13q78SRvWsUWgmKfo3kZoFP82vilyV');
                    
                    // Message details
                    $number = "91".$mobile_num;
                    $sender = urlencode('TXTLCL');
        
        
                    $due_send = $row_patients['Treatment_plan']-$row_payments['paid'];
                    $num = $db->query("SELECT last_insert_rowid() as last_id");
                    $last_id = $num->fetchArray(SQLITE3_ASSOC);
        
        
                    $message = "Dear ".$send_name." You've Paid ".$paid." Succesfully  to INSHA PHYSIOTHERAPY CENTER with Payment ID ".$last_id['last_id']." and Left the due of ".$due_send." Thanks for Visiting #DSK Solutions";
            
            
                    // Prepare data for POST request
                    $data = array('apikey' => $apiKey, 'numbers' => $number, "sender" => $sender, "message" => $message);
            
                    // Send the POST request with cURL
                    $ch = curl_init('https://api.textlocal.in/send/');
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $response = curl_exec($ch);
                    curl_close($ch);
            
                    // Process your response here
            
        
                    $rslt = json_decode($response, JSON_PRETTY_PRINT);
                    var_dump($rslt);

                    
                    ?>