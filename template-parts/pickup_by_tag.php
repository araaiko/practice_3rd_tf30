<!--==  ピックアップ記事（管理画面で編集出来るタイプ）  ==-->
<!-- pickup -->
<div id="pickup">
    <div class="inner">

        <div class="pickup-items">

            <?php
            $pickup_posts = get_posts(array(
                'post_type' => 'post', // 投稿タイプ
                'posts_per_page' => '3', // 3件取得
                'tag' => 'pickup', // pickupタグがついたものを
                'orderby' => 'DESC', // 新しい順に
            ));
            ?>
            <?php foreach ($pickup_posts as $post) : setup_postdata($post); ?>

                <a href="<?php echo esc_url(get_permalink()); ?>" class="pickup-item">
                    <div class="pickup-item-img">
                        <?php
                        if (has_post_thumbnail()) {
                            the_post_thumbnail('large');
                        } else {
                            echo '<img src="' . esc_url(get_template_directory_uri()) . '/img/noimg.png" alt="">';
                        }
                        ?>
                        <div class="pickup-item-tag"><?php my_the_post_category(false); ?></div><!-- /pickup-item-tag -->
                    </div><!-- /pickup-item-img -->
                    <div class="pickup-item-body">
                        <h2 class="pickup-item-title"><?php the_title(); ?></h2><!-- /pickup-item-title -->
                    </div><!-- /pickup-item-body -->
                </a><!-- /pickup-item -->

            <?php endforeach;
            wp_reset_postdata(); ?>

        </div><!-- /pickup-items -->

    </div><!-- /inner -->
</div><!-- /pickup -->