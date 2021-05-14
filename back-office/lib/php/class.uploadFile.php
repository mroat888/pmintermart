<?php
	class UploadFile{
		public function upload_img($element_name,$id,$index,$folder){
			$imageFileType = pathinfo($_FILES[$element_name]["name"],PATHINFO_EXTENSION);
			if($imageFileType == "jpg" or $imageFileType == "jpeg" or $imageFileType == "JPG"){
				$size_1 = $_FILES[$element_name]['size'] ; 
				if($size_1 < 600001) { 
					$img_name = $id."-".$index.".jpg";

					$images = "../$folder/$img_name"; //-- resize
					$new_images = "../$folder/$img_name"; //-- resize

					if(copy($_FILES[$element_name]['tmp_name'],"../$folder/$img_name") ){
						/*
						$size=GetimageSize($images);
						$height=750; //*** Fix Width & Heigh (Autu caculate) //***

						if($size[1] > 750){
							$width = round($height*$size[0]/$size[1]);
						}else{
							$width = $size[0];
						}

						$images_orig = ImageCreateFromJPEG($images);
						$photoX = ImagesX($images_orig);
						$photoY = ImagesY($images_orig);
						$images_fin = ImageCreateTrueColor($width, $height);
						ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
						ImageJPEG($images_fin,$new_images);
						ImageDestroy($images_orig);
						ImageDestroy($images_fin);
						*/

					/*---------------------- ทำ ลายน้ำ Watermark --------------*/		
						// Load the stamp and the photo to apply the watermark to
						/*
						$stamp = imagecreatefrompng('img_watermark/stamp-centralhome.png');
						$im = imagecreatefromjpeg($images);
						$save_watermark_photo_address = $images;

						// Set the margins for the stamp and get the height/width of the stamp image

						$marge_right = 10;
						$marge_bottom = 250;
						$sx = imagesx($stamp);
						$sy = imagesy($stamp);

						// Copy the stamp image onto our photo using the margin offsets and the photo 
						// width to calculate positioning of the stamp. 

						imagecopy($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp));

						// Output and free memory
						// header('Content-type: image/png');

						imagejpeg($im, $save_watermark_photo_address, 100); 
						imagedestroy($im);
						*/
					/*---------------------- จบ  ทำ ลายน้ำ Watermark --------------*/			

						$status = true;
					}else{
						$status = false;
					}
				}else{
					$status = false;
				}
			}else{
				$status = false;
			}
			unlink($_FILES[$element_name]['tmp_name']) ;
			return $status;
		}

		public function delete_img($dir_imgname){
			if(file_exists($dir_imgname)){
				if(unlink($dir_imgname)){
					$status =  true;
				}else{
					$status = false;
				}
			}else{
				$status = false;
			}
			return $status;
		}

		public function edit_img($element_name,$id,$index,$folder,$field,$patch_img){
			unlink($patch_img);
			$imageFileType = pathinfo($_FILES[$element_name]["name"],PATHINFO_EXTENSION);
			if($imageFileType == "jpg" or $imageFileType == "jpeg" or $imageFileType == "JPG"){
				$size_1 = $_FILES[$element_name]['size'] ; 
				if($size_1 < 600001) { 
					$img_name = $id."-".$index.".jpg";
					if(copy($_FILES[$element_name]['tmp_name'],"../$folder/$img_name") ){

					/*---------------------- ทำ ลายน้ำ Watermark --------------*/		
						// Load the stamp and the photo to apply the watermark to
						/*
						$images = "../$folder/$img_name"; 
						$stamp = imagecreatefrompng('img_watermark/stamp-centralhome.png');
						$im = imagecreatefromjpeg($images);
						$save_watermark_photo_address = $images;

						// Set the margins for the stamp and get the height/width of the stamp image

						$marge_right = 10;
						$marge_bottom = 250;
						$sx = imagesx($stamp);
						$sy = imagesy($stamp);

						// Copy the stamp image onto our photo using the margin offsets and the photo 
						// width to calculate positioning of the stamp. 

						imagecopy($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp));

						// Output and free memory
						// header('Content-type: image/png');

						imagejpeg($im, $save_watermark_photo_address, 100); 
						imagedestroy($im);
						*/
					/*---------------------- จบ  ทำ ลายน้ำ Watermark --------------*/

						$status = true;
					}else{
						$status = false;
					}
				}else{
					$status = false;
				}
			}else{
				$status = false;
			}
			unlink($_FILES[$element_name]['tmp_name']) ;
			return $status;
		}


		public function upload_pdf($element_name,$id,$index,$folder){
			$imageFileType = pathinfo($_FILES[$element_name]["name"],PATHINFO_EXTENSION);
			if($imageFileType == "pdf"){
				$size_1 = $_FILES[$element_name]['size'] ; 
				if($size_1 < 1000001) { 
					//$img_name = $id."-".$index.".pdf";
					$img_name = $_FILES[$element_name]["name"];
					if(copy($_FILES[$element_name]['tmp_name'],"../$folder/$img_name") ){
						$status = true;
					}else{
						$status = false;
					}
				}else{
					$status = false;
				}
			}else{
				$status = false;
			}
			unlink($_FILES[$element_name]['tmp_name']) ;
			return $img_name;
		}
	}
?>