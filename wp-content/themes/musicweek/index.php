<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<style type="text/css" media="screen">
		/*颜色*/
		body{
			background:<?php echo get_option('wpd_bgcolor'); ?>;
			font-size:12px;
		}
		.wrap{
			width: 900px;
			margin: 0 auto;
		}
		.wrap p{
			background: #fff;
			box-shadow:0 0 4px #ccc;
			border: 1px solid #ccc;
			padding:5px 20px;font-size:14px;
		}
	</style>
	<title><?php echo bloginfo('name'); ?></title>
</head>
<body>
	<div class="wrap">

	<p>单行文本演示</p>

	<?php echo get_option('wpd_text'); ?>

	<p>复选框</p>
	<?php if(get_option('wpd_checkbox')) {
		echo "11111111111111";
	} ?>

	<p>自定义字段内容</p>
	<?php 
		$links = get_option('wpd_social_nav_links');
		if(!empty($links)) {
			echo '<ul>';			
			foreach($links as $id => $args) {
				if(empty($args['status']))
					continue;			
				echo '<li class="'.$id.'"><a href="'.$args['url'].'" title="'.$args['title'].'">'.$args['title'].'</a></li>';
			}			
			echo '</ul>';
		}
	 ?>
	<p>图片上传</p>

	<?php if (get_option('wpd_logo_upload')!=='') { ?>
		<a id="logo" rel="home" href="<?php echo home_url(); ?>"><img src="<?php echo get_option('wpd_logo_upload') ?>" alt="<?php bloginfo( 'name' ); ?>"/></a>
	<?php } ?>

	<p>下拉菜单选项</p>

	<link rel="stylesheet" type="text/css" href="<?php echo get_option('wpd_color_select'); ?>.css" media="all">

	<p>多行文本输入框演示</p>

	<?php echo get_option('wpd_textarea'); ?>
	</div>
	<!-- end wrap -->
</body>
</html>