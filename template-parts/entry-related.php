<!--==  関連記事の表示  ==-->
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
        <?php endwhile;
        wp_reset_postdata(); ?>

    </div><!-- /related-items -->

    <?php else : echo '関連記事はありません'; ?>

<?php endif; ?>