<?php require("include_header.php"); ?>

<?php
    if($lang == "en"){
        $canonical_page = URL."?lang=en";
    }else{
        $canonical_page = URL;
    }
?>

    <title>JSON</title>
    
    <meta name="description" content="ซื้อ ของตกแต่งบ้าน ของใช้ในบ้าน สไตล์โรงแรม หรูหรา ทันสมัย เพื่อชีวิตที่สะดวกสบายขึ้นอย่างมสไตล์ ตกแต่งบ้าน คอนโด ที่บ้านแบบรีสอร์ท ตอบโจทย์การแต่งบ้าน" />
    <link rel="canonical" href="<?php echo $canonical_page;?>" />

    <style>
        tr , td{
            padding:1rem .5rem;
            border:1px solid #CCC;
        }
        thead {
            background-color:#333;
            color:#FFF;
        }

        button{
            padding:1rem .5rem;
            margin:15px;
        }
    </style>
</head>
<body itemscope itemtype="http://schema.org/WebPage"> 

<div class="container">
    <div class="row">
        <div class="col-12">
            <button type="botton" onclick="loadDoc();">Cheang content</button>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table style="width:100%;">
                <thead>
                    <tr>
                        <td>sku</td>
                        <td>name</td>
                    </tr>
                    <th></th>
                </thead>
                <tbody id="demo">

                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function loadDoc(){
        var xmlhttp = new XMLHttpRequest();
        var txt = '';
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                myObj = JSON.parse(this.responseText);
                for (x in myObj) {
                    txt += ` 
                    <tr>
                        <td>${myObj[x].sku_code}</td>
                        <td>${myObj[x].name}</td>
                    </tr>`;
                }
                document.getElementById("demo").innerHTML = txt;
            }
        }
        xmlhttp.open("GET", "test_json_json.php", true);
        xmlhttp.send();
    }
</script>

<?php require("include_footer.php"); ?>
