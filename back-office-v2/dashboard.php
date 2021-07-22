<?php require_once("header.php"); ?>
    <title>Document</title>
</head>
<body>
    
<div class="div_status"></div>

<div class="container-fluid">
    <?php require_once("top.php"); ?>
    <div class="row">
        <div class="col-2">
            <div class="row"><?php include_once("menu_left.php"); ?></div>
        </div>
        <div class="col-10">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam quo vero eligendi adipisci iste eaque modi, esse sint distinctio! Corrupti amet unde consectetur, saepe reiciendis accusantium odio minima distinctio id!
            <br><br>
            <?php
                $plaintext_password = '1111';
                $crypted = password_hash($plaintext_password, PASSWORD_DEFAULT);
                echo $crypted."<br>";
                $verify = password_verify($plaintext_password, $crypted);
                if ($verify) {
                    echo 'Password Verified!';
                } else {
                    echo 'Incorrect Password!';
                }
            ?>
        </div>
    </div>
</div>


    
<?php require_once("include_footer.php"); ?>

<?php require_once("footer.php"); ?>