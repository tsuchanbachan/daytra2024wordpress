<!-- single.htmlからのコピー -->

  <?php get_header(); ?>

	<!-- content -->
	<div id="content">
		<div class="inner">

			<!-- primary -->
			<main id="primary">

        <?php if (function_exists('bcn_display')) : ?>
				<!-- breadcrumb -->
				<div class="breadcrumb">
          <!-- １行追加するだけ -->
          <?php bcn_display(); ?>
				</div><!-- /breadcrumb -->
        <?php endif; ?>

        <!-- ここをかえていく -->
        <?php if (have_posts()): ?>
          <!-- 記事数分ループ -->
          <?php while(have_posts()): ?>
            <?php the_post(); ?>
            <!-- entry -->
            <article class="entry">

              <!-- entry-header -->
              <div class="entry-header">
                <?php 
                $category = get_the_category();
                if($category[0]) : ?>
                <div class="entry-label"><a href="<?php echo get_category_link($category[0]->term_id); ?>"><?php echo $category[0]->cat_name; ?></a></div><!-- /entry-item-tag -->
                <?php endif; ?>

                <h1 class="entry-title"><?php the_title(); ?></h1><!-- /entry-title -->

                <!-- 公開日、最終更新日 -->
                <!-- entry-meta -->
                <div class="entry-meta">
                  <time class="entry-published" datetime="<?php the_time('c'); ?>">公開日 <?php the_time('Y/n/j'); ?></time>
                  <!-- 更新がない場合（＝更新日と公開日が同じでない）には、更新日の表示はさせない -->
                  <?php if (get_the_modified_time('c') !== get_the_time('c')) : ?>
                  <time class="entry-updated" datetime="<?php the_modified_time('c'); ?>">最終更新日 <?php the_modified_time('Y/n/j'); ?></time>
                  <?php endif; ?>
                </div><!-- /entry-meta -->

                <!-- entry-img（あれば表示、なければnoimg画像） -->
                <div class="entry-item-img">
                  <?php if(has_post_thumbnail($post)): ?>
                  <?php the_post_thumbnail(); ?>
                  <?php else: ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/img/noimg.png" alt="">
                  <?php endif; ?>
                </div><!-- /entry-item-img -->

              </div><!-- /entry-header -->

              <!-- 記事全体（「.entry-body」）をテンプレートタグに。ココから -->
              <!-- entry-body -->
              <div class="entry-body">
                <!-- コンテンツを全て取得 -->
                <?php the_content(); ?>

                <!-- 改ページを有効化 -->
                <?php
                  wp_link_pages(
                    array(
                      'before' => '<nav class="entry-links">',
                      'after' => '</nav>',
                      'link_before' => '',
                      'link_after' => '',
                      'next_or_number' => 'number',
                      'separator' => '',
                    )
                  );
                ?>

              </div><!-- /entry-body -->
              <!-- 記事全体（「.entry-body」）をテンプレートタグに。ココまで -->


              <!-- タグの一覧 -->
              <!-- タグを取得 -->
              <?php $post_tags = get_the_tags(); ?>
              
              <div class="entry-tag-items">
                <div class="entry-tag-head">タグ</div><!-- /entry-tag-head -->

                <?php if($post_tags): ?>
                  <?php foreach($post_tags as $tag) :?>
                    <div class="entry-tag-item"><a href="<?php echo get_tag_link($tag->term_id); ?>"><?php echo $tag->name; ?></a></div><!-- /entry-tag-item -->
                  <?php endforeach; ?>
                <?php endif; ?>

              </div><!-- /entry-tag-items -->


              <!-- 「関連記事」 -->
              <div class="entry-related">
                <div class="related-title">関連記事</div>

                <div class="related-items">

                  <?php
                    // 現在の記事のカテゴリーの情報を取得
                    $categories = get_the_category();
                    $category_ID = array();
                    // カテゴリーIDのみを取得
                    foreach($categories as $category):
                      array_push( $category_ID, $category -> cat_ID);
                    endforeach ;
                    $args = array(
                      // 現在の記事を除く
                      'post__not_in' => array($post -> ID),
                      // 取得件数
                      'posts_per_page'=> 8,
                      // 該当のカテゴリーID
                      'category__in' => $category_ID,
                      // 取得順（ランダム）
                      'orderby' => 'rand',
                    );
                    // 配列の設定をもとに該当する記事情報を取得
                    $query = new WP_Query($args);
                  ?>


                  <!-- 同じカテゴリの記事がある場合にwhileを使ったループで一覧表示 -->
                  <?php if( $query -> have_posts()): while ($query -> have_posts()): $query->the_post(); ?>

                      <a class="related-item" href="<?php the_permalink(); ?>">
                        <div class="related-item-img"><img src="<?php echo get_template_directory_uri(); ?>/img/entry1.png" alt=""></div><!-- /related-item-img -->
                        <div class="related-item-title"><?php the_title(); ?></div><!-- /related-item-title -->
                      </a><!-- /related-item -->

                  <?php endwhile; else: ?>
                    <p>関連記事はありませんでした。</p>
                  <?php endif; ?>
                  <?php wp_reset_postdata(); ?>

                </div><!-- /related-items -->
              </div><!-- /entry-related -->

            </article> <!-- /entry -->

          <?php endwhile; ?>
        <?php endif; ?>


			</main><!-- /primary -->

  <?php get_sidebar(); ?>

  <?php get_footer(); ?>
