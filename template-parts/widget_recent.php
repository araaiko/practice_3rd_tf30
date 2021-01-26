<!-- widget_recent -->
<div class="widget widget_recent">
    <div class="widget-title">新着記事</div>

    <div class="wpost-items">
        <?php
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 5,
            'orderby' => 'date',
            'order' => 'DESC',
        );
        $resent_posts = get_posts($args);
        foreach ($resent_posts as $post) : setup_postdata($post);
        ?>

            <!-- wpost-item -->
            <a class="wpost-item" href="<?php the_permalink(); ?>">
                <div class="wpost-item-img">
                    <?php
                    if (has_post_thumbnail()) {
                        // アイキャッチ画像が設定されてれば中サイズで表示
                        the_post_thumbnail('medium');
                    } else {
                        // なければnoimage画像をデフォルトで表示
                        echo '<img src="' . esc_url(get_template_directory_uri()) . '/img/noimg.png" alt="">';
                    }
                    ?>
                </div>
                <div class="wpost-item-body">
                    <div class="wpost-item-title"><?php the_title(); ?></div>
                </div><!-- /wpost-item-body -->
            </a><!-- /wpost-item -->

        <?php
        endforeach;
        wp_reset_postdata();
        ?>

    </div><!-- /wpost-items -->
</div><!-- /widget -->