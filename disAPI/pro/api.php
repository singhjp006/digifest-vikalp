<?php

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "digifest";

  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  // Check connection
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }

  if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $bhamashah = "";
    $bhamashah_id = $_GET["bhamashah"];
    
    //bhamashah api start
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://apitest.sewadwaar.rajasthan.gov.in/app/live/Service/bahmashah/hofAndMembers/WDYYYGG?client_id=ad7288a4-7764-436d-a727-783a977f1fe1",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_SSL_VERIFYHOST => 0,
      CURLOPT_SSL_VERIFYPEER => 0,
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
/*        echo $response;
        echo "<br />";
        echo "<br />";
        $data = json_decode($response, TRUE);
        print_r($data);

        echo $data['hof_Details']['AADHAR_ID'];
        echo "<br />";

        echo $data['hof_Details']['DOB'];
        echo "<br />";

        echo $data['hof_Details']['BHAMASHAH_ID'];
        echo "<br />";

        echo $data['hof_Details']['NAME_ENG'];
        echo "<br />";
*/
        $data = json_decode($response, TRUE);
        $business_holder = $data['hof_Details']['NAME_ENG'];
        $aadhar_id = $data['hof_Details']['AADHAR_ID'];
        $bhamashah_id = $data['hof_Details']['BHAMASHAH_ID'];
        

        $sql = "INSERT INTO registered_business (business_holder, aadhar_id, bhamashah_id)
        VALUES ('$business_holder', '$aadhar_id', '$bhamashah_id')";

        if (mysqli_query($conn, $sql)) {
          echo "New record created successfully";
          header("Location: registered.php");
          die();
        } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }



    //bhamashah api start
/*    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://apitest.sewadwaar.rajasthan.gov.in/app/live/Service/hofAndMember/ForApp/WDYYYGG?client_id=ad7288a4-7764-436d-a727-783a977f1fe1",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_SSL_VERIFYHOST => 0,
      CURLOPT_SSL_VERIFYPEER => 0,
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
        $data = json_decode($response, TRUE);
        echo $data['hof_Details']['BANK_NAME'];
        $bank_name = $data['hof_Details']['BANK_NAME'];
        $acc_no = $data['hof_Details']['ACC_NO'];
        $ifsc_code = $data['hof_Details']['IFSC_CODE'];
        $village_name = $data['hof_Details']['VILLAGE_NAME'];
        $mobile_no = $data['hof_Details']['MOBILE_NO'];

        $sql = "INSERT INTO registered_business (bank_name, acc_no, ifsc_code, village_name, mobile_no)
        VALUES ('$bank_name', '$acc_no', '$ifsc_code', '$village_name', '$mobile_no')";

        if (mysqli_query($conn, $sql)) {
          echo "New record created successfully";
        } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

     mysqli_close($conn);
   
    }*/
    mysqli_close($conn);
  }
}
?>