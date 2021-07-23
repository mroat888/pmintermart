<?php
    session_start();
    // header('Content-Type: application/json');
    include_once("../../config/config.php");
    include_once("../../lib/php/class.dbConnect.php"); 
    $conn = new Database();

    try{
        if($_SERVER['REQUEST_METHOD'] === "GET"){
            $str_order = "SELECT * FROM order_main ORDER BY order_datetime DESC";
            $result_order = $conn->prepare($str_order);
            $result_order->execute();
    
            if($result_order->rowcount() > 0){
                http_response_code(200);
                
                while($record_order = $result_order->fetch(PDO::FETCH_ASSOC)){             
                    list($date,$time) = explode(" ",$record_order['order_datetime']);
                    $order_discount = number_format($record_order['order_discount']);

                    $selorder = "selorder_process".$record_order['id'];
				    $div_output_status = "div_output_status".$record_order['id'];
?>
                    
                    <tr>
                        <th scope="row" style="text-align: center;"><?php echo $record_order['id']; ?></th>
                        <td style="text-align: left;"><?php echo $date; ?></td>
                        <td style="text-align: right;"><?php echo $order_discount; ?></td>
                        <td style="text-align: right;"><?php echo number_format($record_order['order_sum_price']) ;?></td>
                        <td style="text-align: center;">
                            <select onchange="updateProcess('<?php echo $selorder; ?>',<?php echo $record_order['id']?>);"  id="<?php echo $selorder; ?>" name="<?php echo $selorder; ?>">
                        <?php
                            $str_order_process = 'SELECT * FROM order_process ORDER BY id';
                            $result_order_process = $conn->prepare($str_order_process);
                            $result_order_process->execute();
                            while($record_order_process = $result_order_process->fetch(PDO::FETCH_ASSOC)){
                                if($record_order_process['id'] == $record_order['id_order_process']){
                        ?>
                                    <option value="<?php echo $record_order_process['id'] ;?>" selected><?php echo $record_order_process['name']; ?></option>
                        <?php   
                                }else{ 
                        ?>
                                    <option value="<?php echo $record_order_process['id']; ?>"><?php echo $record_order_process['name']; ?></option>
                        <?php
                                }
                            }
                        ?>
                            </sclect>
                        </td>
                        <td style="text-align: center;">
                            <a href=""><i class='bi bi-credit-card-fill'></i></a>
                            &nbsp;&nbsp;&nbsp;
                            <a href=""><i class='bi bi-eye-fill'></i></a>
                        </td>
                    </tr>
<?php
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