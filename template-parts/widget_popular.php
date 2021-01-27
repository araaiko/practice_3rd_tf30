   <!-- widget_popular -->
   <div class="widget widget_popular">
        <div class="widget-title">人気記事</div>

        <div class="wpost-items m_ranking">
            <?php
            // get_post_viewsで適宜アクセス数を確認
            // $counter = get_post_views();
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 5,
                'meta_key' => 'view_counter',
                'orderby' => 'meta_value_num', //カスタムフィールドで取得した値（今回はアクセス数）を数値として並び替える
                'order' => 'DESC', //降順に
            );
            $popular_posts = get_posts($args);
            foreach ($popular_posts as $post) : setup_postdata($post);
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
    </div><!-- /widget_popular -->