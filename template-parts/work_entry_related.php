<!--==  制作ジャンルの関連記事  ==-->
<?php
$term = array_shift(get_the_terms($post->ID, 'genre'));
$related_query = new WP_Query(
    array(
        'post_type' => 'work', //カスタム投稿の「投稿タイプ」を記述。「single-***.php」の「***」を記入すればOK
        'taxonomy' => 'genre', //タクソノミーを記述。今回でいうと「制作ジャンル」のスラッグを記入
        'term' => $term->slug, //今回でいうところの「Webサイト制作」「SEO支援」「その他」の部分。
        'posts_per_page' => 3, //何記事表示するか
        'post__not_in' => array($post->ID), //現在表示している投稿は除く

    )
);
?>
<?php if ($related_query->have_posts()) : ?>
    <div class="entry-work-related">
        <div class="entry-work-related-head">関連記事</div><!-- /.entry-work-related-head -->
        <div class="entries entries-work entry-work-related-entries">
            <?php while ($related_query->have_posts()) : ?>
                <?php $related_query->the_post(); ?>

                <!-- entry-item -->
                <a href="<?php the_permalink(); ?>" <?php post_class(array('entry-item', 'entry-item-horizontal')); ?>>

                    <!-- entry-item-img -->
                    <div class="entry-item-img">
                        <?php
                        if (has_post_thumbnail()) {
                            the_post_thumbnail('my_thumbnail');
                        } else {
                            echo '<img src="' . esc_url(get_template_directory_uri()) . '/img/noimg.png" alt="">';
                        }
                        ?>
                    </div><!-- /entry-item-img -->

                    <!-- entry-item-body -->
                    <div class="entry-item-body">
                        <div class="entry-item-meta">
                            <div class="entry-item-tag"><?php echo esc_html(get_the_terms(get_the_ID(), 'genre')[0]->name); ?></div><!-- /entry-item-tag -->
                        </div><!-- /entry-item-meta -->
                        <h2 class="entry-item-title"><?php the_title(); ?></h2><!-- /entry-item-title -->
                    </div><!-- /entry-item-body -->

                </a><!-- /entry-item -->

            <?php endwhile; ?>
        </div><!-- /.entry-work-related -->
    </div><!-- /.entry-work-related-entries -->

<?php else : echo '関連記事はありません'; ?>

<?php endif; ?>
<?php wp_reset_postdata(); ?>
<!--==  /制作ジャンルの関連記事  ==-->