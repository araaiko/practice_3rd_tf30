<!--==  header.php 読み込み ==-->
<?php get_header(); ?>

<!-- content -->
<div id="content">
    <div class="inner">

        <!-- primary -->
        <main id="primary">

            <?php if (function_exists('bcn_display')) : ?>
                <!-- breadcrumb -->
                <div class="breadcrumb">
                    <?php bcn_display(); ?>
                </div><!-- /breadcrumb -->
            <?php endif; ?>

            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <!-- entry -->
                    <article <?php post_class( array( 'entry' ) ); ?>>

                        <!-- entry-header -->
                        <div class="entry-header">
                            <?php
                            // カテゴリー１つ目の名前を表示
                            $category = get_the_category();
                            if ($category[0]) : ?>
                                <div class="entry-label"><a href="<?php echo esc_url(get_category_link($category[0]->term_id)); ?>"><?php echo $category[0]->cat_name; ?></a></div><!-- /entry-item-tag -->
                            <?php endif; ?>
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
                        <?php $post_tags = get_the_tags(); ?>
                        <div class="entry-tag-items">
                            <div class="entry-tag-head">タグ</div><!-- /entry-tag-head -->
                            <?php if ($post_tags) : ?>
                                <?php foreach ($post_tags as $tag) : ?>
                                    <div class="entry-tag-item"><a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>"><?php echo esc_html($tag->name); ?></a></div><!-- /entry-tag-item -->
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div><!-- /entry-tag-items -->


                        <div class="entry-related">
                            <div class="related-title">関連記事</div>

                            <?php
                            //現在の投稿IDからカテゴリーを取得する
                            $categories = get_the_category($post->ID);
                            //カテゴリーIDを代入する配列を定義する
                            $category_id = array();

                            foreach ($categories as $category) {
                                //現在の投稿が持っているカテゴリーIDを配列に格納
                                array_push($category_id, $category->cat_ID);
                            }

                            $args = array(
                                'post__not_in' => array($post->ID),  //現在の投稿を関連記事から除外する
                                'posts_per_page' => 8,                //関連記事に表示する投稿数を指定
                                'category__in' => $category_id,      //この投稿と同じカテゴリーに属する投稿の中から
                                'orderby' => 'rand',                 //ソートをランダムに指定
                            );
                            $query = new WP_Query($args);
                            ?>

                            <?php if ($query->have_posts()) : ?>

                                <div class="related-items">

                                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                                        <a class="related-item" href="<?php the_permalink(); ?>">
                                            <div class="related-item-img">
                                                <?php
                                                if (has_post_thumbnail()) {
                                                    // アイキャッチ画像が設定されてればミディアムで表示
                                                    the_post_thumbnail('medium');
                                                } else {
                                                    // なければnoimage画像をデフォルトで表示
                                                    echo '<img src="' . esc_url(get_template_directory_uri()) . '/img/noimg.png" alt="">';
                                                }
                                                ?>
                                            </div><!-- /related-item-img -->
                                            <div class="related-item-title"><?php the_title(); ?></div><!-- /related-item-title -->
                                        </a><!-- /related-item -->
                                    <?php endwhile; wp_reset_postdata(); ?>

                                </div><!-- /related-items -->

                                <?php else : echo '関連記事はありません';?>

                            <?php endif; ?>
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