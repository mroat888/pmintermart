<div class="row">
<div class="col-9">
<div class="box_predetail">
    <?php
		$first_img = URL_IMG.FOLDER_SKU."/".$record_sku['sku_code']."__1.jpg";
		$second_img = URL_IMG.FOLDER_SKU."/".$record_sku['sku_code']."__2.jpg";
	?>
    <?php
            // if($record_sku['instock'] <= 0){
            //         $filter = "filter: grayscale(100%);";
    ?>
            <!-- <div class="div-outstock">
                    สินค้าหมด
            </div> -->
    <?php
                // }else{
                //     $filter = "";
                // }
    ?>
    <img id="image_product" src="<?php echo $first_img; ?>" style="max-width:100%;" alt="<?php echo $record_products['name']; ?>" draggable="false">
</div>
</div>
<div class="col-3">
    <div class="gallery-column">
        <?php 
            for($i=1; $i<4; $i++){
                $path_img = URL_IMG.FOLDER_SKU."/".$record_sku['sku_code']."__".$i.".jpg";
                if(file_exists(FOLDER_SKU."/".$record_sku['sku_code']."__".$i.".jpg")) {
                    $elename_image = "divimgproduct_".$i;
        ?>
                    <div class="row" style="margin-bottom: 1em;">
                        <div class="col-12">
                            <img src="<?php echo $path_img; ?>" style="max-width:100%; padding: 10px;" 
                            alt="<?php echo $record_products['name']; ?>" 
                            draggable="false" onclick="switch_img('<?php echo $path_img; ?>');">
                        </div>
                    </div>
        <?php
                }
            }
        ?>
            
    </div>
</div>
</div>

<style type="text/css">
    .gallery-column{
        cursor: pointer;
        /*float: left;*/
        width: 100%;       
        /*padding: 0.3em;   */ 
    }
    .gallery-column img{
        border:solid 0.1em #d6d6d6;
    }
    .gallery-column img:hover{
        border: 0.1em solid #ffd21d;
    }
</style> 

<script type="text/javascript">

function switch_img(patchimage){
    var imgproducts = document.getElementById('image_product');
    imgproducts.src = patchimage;
}

function openModal() {
    document.getElementById("myModal").style.display = "block";
}

function closeModal() {
    document.getElementById("myModal").style.display = "none";
}

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("demo");
    var captionText = document.getElementById("caption");
    if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " active";
    captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>

<style type="text/css">
    .div-outstock{
        position: absolute;
        text-align: center;
        line-height: 3em;
        width: 90%;
        top:0;
        margin-left: 0;
        margin-top: 4em;
        opacity: 50%;
        background-color: #999; 
        color: #FF0000;
        font-size: 2em;
        border-radius: 0.5em;
        z-index: 1;
    }
</style>