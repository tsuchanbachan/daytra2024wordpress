<!-- 多分これは不要？ -->

<?php get_header(); ?>

<!-- <?php echo "archive" ?> -->

<!-- main-visual -->
<div class="mainvisual">
  <div class="inner">
    <div class="mainvisual-content">
      <div class="mainvisual-title">制作実績</div>
    </div>
  </div><!-- /inner -->
</div><!-- /main-visual -->

<div class="work-breadcrumb">
  <div class="inner">

    <!-- プラグインがない場合には、エラーではなく、パンくずを表示させない -->
    <?php if (function_exists('bcn_display')) : ?>
    <!-- breadcrumb -->
    <div class="breadcrumb">

      <?php bcn_display(); ?>

      <!-- ここを置き換える -->
      <!-- <span property="itemListElement" typeof="ListItem"> -->
        <!-- <a property="item" typeof="WebPage" href="/" class="home"><span property="name">ホーム</span></a> -->
        <!-- <meta property="position" content="1"> -->
      <!-- </span> -->
      <!-- <i class="fas fa-angle-right"></i> -->
      <!-- <span class="current-item">カスタム一覧ページのタイトルが入ります</span> -->

    </div><!-- /breadcrumb -->
    <?php endif; ?>

  </div><!-- /inner -->
</div><!-- /work-breadcrumb -->


<!-- content -->
<div id="content" class="content-work">
  <div class="inner">

    <!-- primary -->
    <main id="primary">

      <div class="genre-nav">
        <div class="genre-nav-link"><a class="is-active" href="">すべて</a></div>
        <div class="genre-nav-link"><a href="">Webサイト制作</a></div>
        <div class="genre-nav-link"><a href="">SEO支援</a></div>
        <div class="genre-nav-link"><a href="">その他</a></div>
      </div><!-- /genre-nav -->

      <!-- entries -->
      <div class="entries entries-work">

        <!-- 記事があれば表示 -->
        <?php if (have_posts()):?>
          <!-- 記事数分ループ -->
          <?php while(have_posts()): ?>

            <?php the_post(); ?>
            <a href="<?php the_permalink(); ?>" class="entry-item entry-item-horizontal">

              <div class="entry-item-img">
                <?php if(has_post_thumbnail()): ?>
                  <?php the_post_thumbnail(); ?>
                  <?php else: ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/img/noimg.png" alt="">
                <?php endif; ?>
              </div>

              <div class="entry-item-body">

                <div class="entry-item-meta">
                  <!-- カテゴリー1つy目の名前を表示 -->
                  <?php
                    $category = get_the_category();
                    if($category[0]): ?>
                      <div class="entry-item-tag"><?php echo $category[0]->cat_name; ?></div>
                    <?php endif; ?>
                    <time class="entry-item-published" datetime="<?php the_time('c'); ?>"><?php the_time('Y/n/j'); ?></time>
                </div>
                <!-- タイトル -->
                <div class="entry-item-title"><?php the_title(); ?></div>
                <!-- 抜粋 -->
                <div class="entry-item-excerpt"><?php the_excerpt(); ?></div>
              </div><!-- /entry-item-body -->
            </a><!-- /entry-item -->

          <?php endwhile; ?>
        <?php endif; ?>

      </div><!-- /entries -->

      <?php if(paginate_links()): ?>
      <!-- pagination -->
      <div class="pagination">
        <?php
          echo paginate_links (
            array(
              'end_size' => 1,
              'mid_size' => 1,
              'prev_next' => true,
              'prev_test' => '<i class="fas fa-angle-left"></i>',
              'next_text' => '<i class="fas fa-angle-right"></i>',
            )
          );
        ?>

        <!-- <span class="page-numbers current">1</span> -->
        <!-- <a class="page-numbers" href="#">2</a> -->
        <!-- <a class="page-numbers" href="#">3</a> -->
        <!-- <a class="next page-numbers" href="#"><i class="fas fa-angle-right"></i></a> -->
      </div><!-- /pagination -->
      <?php endif; ?>

    </main><!-- /primary -->

  </div><!-- /.inner -->
  </div><!-- /.content -->

<?php get_footer(); ?>