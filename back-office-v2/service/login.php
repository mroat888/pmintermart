<?php
    session_start();
    header('Content-Type: application/json');
    include_once("../../config/config.php");
    include_once("../../lib/php/class.dbConnect.php"); 
    $conn = new Database();

    try{
        if($_SERVER['REQUEST_METHOD'] === "POST"){
            /**
             ***** Function hashed_password *****
             */
                /*$plaintext_password = $_POST['tPassword'];
                $hashed_password = password_hash($plaintext_password, PASSWORD_DEFAULT);

                $verify = password_verify($plaintext_password, $hashed_password);
                if ($verify) {
                    echo 'Password Verified!';
                } else {
                    echo 'Incorrect Password!';
                }*/
            /* ----------------------*/

            $param_array = array(
                ':param_tuser' => $_POST['tUsername'], 
                ':param_status' => 'Y'
            );

            $str_login = "SELECT id, upassword FROM admin WHERE ( uname  = :param_tuser ) and (status  = :param_status)";
            $result_login = $conn->prepare($str_login);
            $result_login->execute($param_array);
    
            if($result_login->rowcount() > 0){
                $record_login = $result_login->fetch(PDO::FETCH_ASSOC);
                $upassword = $record_login['upassword'];
                $verify = password_verify($_POST['tPassword'], $upassword);

                if($verify){
                    $_SESSION['ss_id'] = session_id() ;
                    $_SESSION['ss_accountid'] = $record_login['id'];
                    
                    http_response_code(200);
                    echo json_encode($resporn = [
                        'status' => true,
                        'message' => 'Login Success'
                    ]);
                }else{
                    http_response_code(400);
                    echo json_encode($resporn = [
                        'status' => false,
                        'message' => 'File Not Found.'
                    ]);   
                }

            }else{
                http_response_code(400);
                echo json_encode($resporn = [
                    'status' => false,
                    'message' => 'File Not Found.'
                ]);
            }
        }
    }catch(Excaption $ex){
        echo $ex->getMessage();
    }
?>