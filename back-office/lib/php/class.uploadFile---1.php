<?php
	class UploadFile{
		public function upload_img($element_name,$id,$index,$folder){
			$imageFileType = pathinfo($_FILES[$element_name]["name"],PATHINFO_EXTENSION);
			if($imageFileType == "jpg" or $imageFileType == "jpeg" or $imageFileType == "JPG"){
				$size_1 = $_FILES[$element_name]['size'] ; 
				if($size_1 < 300001) { 
					$img_name = $id."-".$index.".jpg";
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
				if($size_1 < 300001) { 
					$img_name = $id."-".$index.".jpg";
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