<?php 

use App\Constants;

function get_professionals() {

    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://api.feegow.com/v1/api/professional/list",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_POSTFIELDS => "",
        CURLOPT_HTTPHEADER => [
            "Content-Type: application/json",
            "x-access-token: " . Constants::API_TOKEN
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    $json_response = json_decode($response, TRUE);

    if ($err || $json_response['success'] == FALSE) {
        echo    "<script> 
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: " . Constants::ERR_MSG_PROFESSIONALS_LIST . "
                    })
                </script>";
    } else if ($json_response['success'] == TRUE) {
        return $json_response['content'];
    }

    return array();
}

function get_specialties() {
    
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://api.feegow.com/v1/api/specialties/list",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_POSTFIELDS => "",
        CURLOPT_HTTPHEADER => [
            "Content-Type: application/json",
            "x-access-token: " . Constants::API_TOKEN
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);
    
    $json_response = json_decode($response, TRUE);

    if ($err || $json_response['success'] == FALSE) {
        echo    "<script> 
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: " . Constants::ERR_MSG_SPECIALTIES_LIST . "
                    })
                </script>";
    } else if ($json_response['success'] == TRUE) {
        return $json_response['content'];
    }

    return array();
}

function get_patients() {

    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://api.feegow.com/v1/api/patient/list",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_POSTFIELDS => "",
        CURLOPT_HTTPHEADER => [
          "Content-Type: application/json",
          "x-access-token: " . Constants::API_TOKEN
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);
    
    $json_response = json_decode($response, TRUE);

    if ($err || $json_response['success'] == FALSE) {
        echo    "<script> 
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: " . Constants::ERR_MSG_PATIENTS_LIST . "
                    })
                </script>";
    } else if ($json_response['success'] == TRUE) {
        return $json_response['content'];
    }

    return array();
}

function get_patients_mock() {
    return array(
        array("patient_id" => 9, "nome" => "ANA CAROLINA GOMES REBELO MELO"),
        array("patient_id" => 10, "nome" => "ADRIANA GONDIM VIEIRA GONÇALVES"),
        array("patient_id" => 11, "nome" => "ARTHUR CESAR DANTAS DA SILVA"),
        array("patient_id" => 12, "nome" => "BRENDA RIBEIRO GIRAO"),
        array("patient_id" => 13, "nome" => "INGRID RIBEIRO TAVARES")
    );
}

?>