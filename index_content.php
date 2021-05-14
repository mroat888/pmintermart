<div class="container-fluid" style="margin-top:5em; margin-bottom:5em;">
	<div class="row">
		<div class="container">
			<div class="row">
				<div class="col-10">
					<h2>PM Blog</h2>
					<p style="font-size: 0.9em; color: #666; margin-top: -0.5em;">อัพเดทข่าวสาร บทความไลฟ์สไตล์ ตอบโจทย์ทุกไลฟ์สไตล์การใช้ชีวิต</p>
				</div>
				<div class="col-2" style="text-align: right; line-height: 5em;">
					<a href="<?php echo URL;?>content.php">ดูบทความทั้งหมด</a>
				</div>
			</div>
            
			<div class="row">
            <?php
                $str_wp_posts = "select * from wp_posts where post_status = 'publish' and post_type = 'post' 
                order by id desc LIMIT 0, 4";
                $result_wp_posts = $conn_wp->prepare($str_wp_posts);
                $result_wp_posts->execute();
                while($record_wp_posts = $result_wp_posts->fetch(PDO::FETCH_ASSOC)){
                    $link_url = "content_topic.php?id=".$record_wp_posts['ID'];
    
                    $array_wp_postmeta = array(':param_postid' => $record_wp_posts['ID']);
                    $str_wp_postmeta = "select meta_value from wp_postmeta where post_id = :param_postid and meta_key = '_thumbnail_id'";
                    $result_wp_postmeta = $conn_wp->prepare($str_wp_postmeta);
                    $result_wp_postmeta->execute($array_wp_postmeta);
                    $record_wp_postmeta = $result_wp_postmeta->fetch(PDO::FETCH_ASSOC);
    
                    $array_wp_posts_img = array(
                        ':param_id' => $record_wp_postmeta['meta_value'], 
                        ':param_postid' => $record_wp_posts['ID']
                    );
    
                    $str_wp_posts_img = "select post_title, guid from wp_posts where id = :param_id and post_parent = :param_postid and post_type = 'attachment' and (post_mime_type = 'image/jpeg' or post_mime_type = 'image/png')";
                    $result_wp_posts_img = $conn_wp->prepare($str_wp_posts_img);
                    $result_wp_posts_img->execute($array_wp_posts_img);
                    $record_wp_posts_img = $result_wp_posts_img->fetch(PDO::FETCH_ASSOC);
    
                    $image_path = $record_wp_posts_img['guid'];
                    $image_alt = $record_wp_posts_img['post_title'];
            ?>
                <div class="col-3">
                	<div class="row">
                		<div class="col-12">
                			<a href="<?php echo $link_url; ?>">
                			    <img src="<?php echo $image_path; ?>" alt="<?php echo $image_alt; ?>" style="max-width: 100%;">
                			</a>
                		</div>
                		<div class="col-12" style="margin-top: 1em;">
                			<a href="<?php echo $link_url; ?>" class="font_black">
		                		<p><strong><?php echo $record_wp_posts['post_title']; ?></strong></p>
		                	</a>
		                	<a href="<?php echo $link_url; ?>" class="font_black">
		                		<p><?php echo $record_wp_posts['post_excerpt']; ?></p>
		                	</a>
		                </div>
                	</div>
				</div>
            <?php
                }
            ?>
            </div>
		</div>
	</div>
</div>