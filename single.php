<!--==  header.php 読み込み ==-->
<?php get_header(); ?>

<!-- content -->
<div id="content">
    <div class="inner">

        <!-- primary -->
        <main id="primary">

            <!--==  breadcrumb読み込み  ==-->
            <?php get_template_part('template-parts/breadcrumb'); ?>

            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <!-- entry -->
                    <article <?php post_class(array('entry')); ?>>

                        <!-- entry-header -->
                        <div class="entry-header">
                            <!-- trueを引数として渡すとリンク付き、falseを渡すとリンクなし -->
                            <div class="entry-label"><?php my_the_post_category(true); ?></div><!-- /entry-item-tag -->
                            <h1 class="entry-title"><?php the_title(); //タイトルを表示 
                                                    ?></h1><!-- /entry-title -->

                            <!-- entry-meta -->
                            <div class="entry-meta">
                                <time class="entry-published" datetime="<?php the_time('c'); ?>">公開日 <?php the_time('Y/n/j'); ?></time>
                                <?php if (get_the_modified_time('Y-m-d') !== get_the_time('Y-m-d')) : ?>
                                    <time class="entry-updated" datetime="<?php the_modified_time('c'); ?>">最終更新日 <?php the_modified_time('Y/n/j'); ?></time>
                                <?php endif; ?>
                            </div><!-- /entry-meta -->

                            <!-- entry-img -->
                            <div class="entry-img">
                                <?php
                                if (has_post_thumbnail()) {
                                    // アイキャッチ画像が設定されてれば大サイズで表示
                                    the_post_thumbnail('large');
                                } else {
                                    // なければnoimage画像をデフォルトで表示
                                    echo '<img src="' . esc_url(get_template_directory_uri()) . '/img/noimg.png" alt="">';
                                }
                                ?>
                            </div><!-- /entry-img -->

                        </div><!-- /entry-header -->

                        <!-- entry-body -->
                        <div class="entry-body">
                            <?php
                            //本文の表示
                            the_content(); ?>
                            <?php
                            //改ページを有効にするための記述
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

                        <!-- entry-tag-items -->
                        <div class="entry-tag-items">
                            <div class="entry-tag-head">タグ</div><!-- /entry-tag-head -->
                            <?php
                            if (has_tag($tags)) {
                                my_the_post_tags();
                            }
                            ?>
                        </div><!-- /entry-tag-items -->


                        <div class="entry-related">
                            <div class="related-title">関連記事</div>

                            <!--==  関連記事の表示の読み込み  ==-->
                            <?php get_template_part('template-parts/entry', 'related'); ?>

                        </div><!-- /entry-related -->

                    </article> <!-- /entry -->

                <?php endwhile; ?>
            <?php endif; ?>

        </main><!-- /primary -->

        <!--==  sidebar.phpの読み込み  ==-->
        <?php get_sidebar(); ?>


    </div><!-- /inner -->
</div><!-- /content -->

<!--==  footer.phpの読み込み  ==-->
<?php get_footer(); ?>