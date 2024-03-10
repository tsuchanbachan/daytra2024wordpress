<!DOCTYPE html>
<html lang="ja" prefix="og: http://ogp.me/ns#">

<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="format-detection" content="telephone=no">

  <!-- ワードプレス側で生成するので削除 -->
	<!-- <title>TF-30</title>
	<meta name="description" content=""> -->

	<meta property="og:title" content="TF-30">
	<meta property="og:type" content="website">
	<meta property="og:url" content="https://example.com/">
	<meta property="og:image" content="https://example.com/img/ogp.png">
	<meta property="og:site_name" content="TF-30">
	<meta property="og:description" content="">
	<meta name="twitter:card" content="summary_large_image">

	<link rel="icon" href="<?php echo get_template_directory_uri(); ?>./img/icon-home.png">

  <?php wp_head(); ?>
</head>

<body>

	<!-- header -->
	<header id="header">
		<div class="inner">

			<!-- 動的に置き換える -->
			<!-- <h1 class="header-logo"><a href="/">TF-30</a></h1> -->
			<!-- <div class="header-sub">サブタイトルが入りますサブタイトルが入ります</div> -->

			<!-- トップページではh1に、それ以外ではdivに -->
			<?php if(is_front_page()): ?>
				<h1 class="header-logo"><a href="<?php echo home_url('/'); ?>"><?php bloginfo('name'); ?></a></h1>
				<?php else : ?>
			<div class="header-logo"><a href="<?php echo home_url('/'); ?>"><?php bloginfo('name'); ?></a></div>
			<?php endif; ?>

			<div class="header-sub"><?php bloginfo('description'); ?></div>
				


			<!-- drawer -->
			<div class="drawer">
				<div class="drawer-icon">
					<span class="drawer-open"><i class="fas fa-bars"></i></span><!-- /drawer-open -->
					<span class="drawer-close"><i class="fas fa-times"></i></span><!-- drawer-close -->
				</div><!-- /drawer-icon -->

				<!-- drawer-content -->
				<div class="drawer-content">
					<nav class="drawer-nav">

						<?php
							wp_nav_menu(
								array(
									/* 階層 */
									'depth' => 1,
									'theme_location' => 'drawer',
									'container' => '',
									'menu_class' => 'drawer-list',
								)
							);
						?>

						<!-- <ul class="drawer-list"> -->
							<!-- <li class="m_icon1 menu-item"><a href="#">メニュー1</a></li> -->
							<!-- <li class="m_icon2 menu-item"><a href="#">メニュー2</a></li> -->
							<!-- <li class="m_icon3 menu-item"><a href="#">メニュー3</a></li> -->
							<!-- <li class="m_icon4 menu-item"><a href="#">メニュー4</a></li> -->
							<!-- <li class="m_icon5 menu-item"><a href="#">メニュー5</a></li> -->
						<!-- </ul> -->
					</nav>
				</div><!-- /drawer-content -->
			</div><!-- /drawer -->

		</div><!-- /inner -->
	</header><!-- /header -->

	<!-- header-nav -->
	<nav class="header-nav">
		<div class="inner">
			<?php
				wp_nav_menu(
					array(
						/* 階層 */
						'depth' => 1,
						'theme_location' => 'global',
						'container' => '',
						'menu_class' => 'header-list',
					)
				);
			?>
			<!-- <ul class="header-list"> -->
				<!-- <li class="m_icon1 menu-item"><a href="#">メニュー1</a></li> -->
				<!-- <li class="m_icon2 menu-item"><a href="#">メニュー2</a></li> -->
				<!-- <li class="m_icon3 menu-item"><a href="#">メニュー3</a></li> -->
				<!-- <li class="m_icon4 menu-item"><a href="#">メニュー4</a></li> -->
				<!-- <li class="m_icon5 menu-item"><a href="#">メニュー5</a></li> -->
			<!-- </ul> -->
		</div><!-- /inner -->
	</nav><!-- header-nav -->
