<?php
    include("include_header.php");

    $id = $_POST['id'];
    $data_order = array(':param_idorder' => $id);
    $str_payment = "select * from order_payment where id_order = :param_idorder";
    $result_payment = $conn->prepare($str_payment);
    $result_payment->execute($data_order);
    $record_payment = $result_payment->fetch(PDO::FETCH_ASSOC);
?>

    <table class="table" style="width:100%;">
        <tbody>
            <tr>
                <th scope="row" style="width:20%;">Name :</th>
                <td><?php echo $record_payment['name']?></td>
            </tr>
            <tr>
                <th scope="row">email :</th>
                <td><?php echo $record_payment['email']?></td>
            </tr>
            <tr>
                <th scope="row">phone :</th>
                <td><?php echo $record_payment['phone']?></td>
            </tr>
            <tr>
                <th scope="row">amount :</th>
                <td><?php echo number_format($record_payment['transfer_amount'])?></td>
            </tr>
            <tr>
                <th scope="row">datetime :</th>
                <td><?php echo $record_payment['payment_datetime']?></td>
            </tr>
            <tr>
                <th scope="row">detail :</th>
                <td><?php echo $record_payment['detail']?></td>
            </tr>
            <tr>
                <th scope="row">payment methods :</th>
                <td><?php echo $record_payment['payment_methods']?></td>
            </tr>
        </tbody>
    </table>

    <?php
		if($record_payment['payment_slip'] != ""){	
			if(file_exists("../payment_slip/".$record_payment['payment_slip'])) {
			    $payment_slip_img = URL."payment_slip/".$record_payment['payment_slip'];
                ?>
                    <a href="<?php echo $payment_slip_img; ?>" target="_blank">
                        <img src="<?php echo $payment_slip_img; ?>" style="max-width:100%;">
                    </a>
                <?php
            }
        }
    ?>
