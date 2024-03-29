	<!-- footer-menu -->
	<div id="footer-menu">
		<div class="inner">
			<div class="footer-logo"><a href="/">TF-30</a></div><!-- /footer-logo -->
			<div class="footer-sub">サブタイトルが入りますサブタイトルが入ります</div><!-- /footer-sub -->

			<nav class="footer-nav">

				<?php
					wp_nav_menu(
						array(
							/* 階層 */
							'depth' => 1,
							/* 【functions.php】で指定したregister_nav_menusのarrayの名前に合わせる */
							'theme_location' => 'footer',
							'container' => '',
							/* 元々使用していたクラス名 */
							'menu_class' => 'footer-list',
						)
					);
				?>

				<!-- <ul class="footer-list"> -->
					<!-- <li class="menu-item"><a href="#">メニュー1</a></li> -->
					<!-- <li class="menu-item"><a href="#">メニュー2</a></li> -->
					<!-- <li class="menu-item"><a href="#">メニュー3</a></li> -->
					<!-- <li class="menu-item"><a href="#">メニュー4</a></li> -->
					<!-- <li class="menu-item"><a href="#">メニュー5</a></li> -->
				<!-- </ul> -->
			</nav>

		</div><!-- /inner -->
	</div><!-- /footer-menu -->



	<!-- footer -->
	<footer id="footer">
		<div class="inner">
			<div class="copy">&copy; daily-trial WordPress theme All rights reserved.</div><!-- /copy -->
			<div class="by">Presented by <a href="https://tokyofreelance.jp/" rel="noopener" target="_blank">東京フリーランス</a>
			</div><!-- /by -->

		</div><!-- /inner -->
	</footer><!-- /footer -->

	<?php if (is_single()): ?>
	<div class="footer-sns">
		<div class="inner">
			<div class="footer-sns-head">この記事をシェアする</div><!-- /footer-sns-head -->

			<nav class="footer-sns-buttons">
				<ul>
					<li><a class="m_twitter"
							href="https://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>" rel="nofollow"
							target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/icon-twitter.png" alt=""></a></li>

					<li><a class="m_facebook" href="https://www.facebook.com/share.php?u=<?php the_permalink(); ?>"
							rel="nofollow" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/icon-facebook.png" alt=""></a></li>

					<li><a class="m_hatena"
							href="https://b.hatena.ne.jp/add?mode=confirm&url=<?Php the_permalink(); ?>&title=<?php the_title(); ?>"
							rel="nofollow" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/icon-hatena.png" alt=""></a></li>

					<li><a class="m_line" href="https://social-plugins.line.me/lineit/share?url=<?php the_permalink(); ?>"
							rel="nofollow" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/icon-line.png" alt=""></a></li>

					<li><a class="m_pocket" href="https://getpocket.com/edit?url=<?php the_permalink(); ?>" rel="nofollow"
							target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/icon-pocket.png" alt=""></a></li>
				</ul>
			</nav><!-- /footer-sns-buttons -->

		</div><!-- /inner -->
	</div><!-- /footer-sns -->
	<?php endif; ?>

	<div class="floating">
		<a href="#"><i class="fas fa-chevron-up"></i></a>
	</div>

  <?php wp_footer(); ?>
</body>

</html>
