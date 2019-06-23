<!DOCTYPE html>
<html>
<head>
	<title>Sport News (VNEXPRESS)</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="script.js"></script>
</head>
<body>
	<div class="container_default">
		<div class="core">
			<h4>Tin tức thể thao mới nhất từ VNEXPRESS</h4>
			<div class="header_new">
				<div class="header_main">
					<?php
						$subject = file_get_contents("https://vnexpress.net/the-thao");
						$pattern = '#<article>(.*)</article>#imsU';
						preg_match($pattern, $subject, $match);
						$document = array();

						$pattern_link = '#href="(.*)"#imsU';
						preg_match($pattern_link, $match[0], $link);

						$pattern_img = '#<img.*src="(.*)".*>#imsU';
						preg_match($pattern_img, $match[0], $img);

						$pattern_title = '#<h1.*class="title_news".*a.*title="(.*)">#imsU';
						preg_match($pattern_title, $match[0], $title);

						$pattern_description = '#class="description">(.*)<#imsU';
						preg_match($pattern_description, $match[0], $description);
						
					?>
					<a href="<?php echo $link[1]; ?>">
						<div class="wrap_image">
							<img src="<?php echo $img[1]; ?>">
						</div>
						<h3 class="wrap_title">
							<?php echo $title[1]; ?>
						</h3>
						<div class="wrap_description">
							<?php echo $description[1]; ?>
						</div>
					</a>	
				</div>
				<div class="header_suggess">
					<?php
						$pattern_sug = '#<ul\sid="list_sub_featured".*li>(.*)</li.*/ul>#imsU';
						preg_match($pattern_sug, $subject, $matches);
						$data = array();

						$list = '#<li>(.*)</li>#imsU';
						preg_match_all($list, $matches[0], $res);

						foreach ($res[0] as $key => $value) {
							$_link = '#href="(.*)"#imsU';
							preg_match($_link, $value, $k_l);
							echo "<a href='".$k_l[1]."'><div class='row_sug'>";
							$_title = '#<h4\sclass="title_news".*a.*title="(.*)">#imsU';
							preg_match($_title, $value, $k_t);
							echo "<div class='title_sug'>".$k_t[1]."</div>";
							$_des = '#class="description">(.*)</p>#imsU';
							preg_match($_des, $value, $k_p);
							echo "<div class='des_sug'>".$k_p[1]."</div>";
							echo "</div></a>";
						}
					?>
				</div>
				<div class="clear"></div>
			</div>
			<div class="body_content">
				<?php
					$pattern_body = '#<section\sclass="sidebar_1"\sid="news_home">(.*).*class="view_by_date"#imsU';
					preg_match($pattern_body, $subject, $body);
					$main_body = '#<article\sclass="list_news">(.*)</article>#imsU';
					preg_match_all($main_body, $body[0], $main);
					foreach ($main[0] as $key => $value) {
						$patern_link_main = '#href="(.*)"#imsU';
						preg_match($patern_link_main, $value, $link_main);

						$patern_image_main = '#<img.*data-original="(.*)".*>#imsU';
						preg_match($patern_image_main, $value, $image_main);

						$patern_title_main = '#<img.*alt="(.*)".*>#imsU';
						preg_match($patern_title_main, $value, $title_main);

						$patern_des_main = '#class="description">(.*)</p>#imsU';
						preg_match($patern_des_main, $value, $des_main);
						
				?>
					<a href="<?php echo $link_main[1]; ?>">
						<div class="row_main">
							<div class="lay_left">
								<div class="wrap_image_main">
									<img src="<?php echo $image_main[1]; ?>">
								</div>
							</div>
							<div class="lay_right">
								<div class="main_title">
									<?php echo $title_main[1]; ?>
								</div>
								<div class="wrap_description" style="margin-left:0;">
									<?php echo $des_main[1]; ?>
								</div>
							</div>
							<div class="clear"></div>
						</div>
					</a>
					
				<?php		
					}
				?>
				 
			</div>
		</div>
	</div>
	<div class="dialog_box">
		<div class="box_content"></div>
		<div class="close" onclick="document.getElementsByClassName('dialog_box')[0].style.display = 'none'; ">&times;</div>
	</div>
</body>
</html>













