<!--==  header.php 読み込み ==-->
<?php get_header(); ?>

<!-- content -->
<div id="content" class="m_one">
    <div class="inner">

        <!-- primary -->
        <main id="primary">

        <!--==  breadcrumb読み込み  ==-->
        <?php get_template_part('template-parts/breadcrumb') ; ?>

            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <!-- entry -->
                    <article <?php post_class(array('entry', 'm_page')); ?>>

                        <!-- entry-header -->
                        <div class="entry-header">
                            <h1 class="entry-title"><?php the_title(); //タイトルを表示 
                                                    ?></h1><!-- /entry-title -->

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
                    </article> <!-- /entry -->

                <?php endwhile; ?>
            <?php endif; ?>

        </main><!-- /primary -->

    </div><!-- /inner -->
</div><!-- /content -->

<!--==  footer.phpの読み込み  ==-->
<?php get_footer(); ?>