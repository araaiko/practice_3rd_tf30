<?php

/**
 * Archive Work
 */

get_header(); ?>

<!-- mainvisual -->
<div class="mainvisual">
    <div class="inner">
        <div class="mainvisual-content">
            <div class="mainvisual-title">制作実績</div><!-- /.mainvisual-title -->
        </div><!-- /.mainvisual-content -->
    </div><!-- /.inner -->
</div><!-- /.mainvisual -->

<?php get_template_part('template-parts/work_breadcrumb'); ?>

<!-- content -->
<div id="content" class="content-work">
    <div class="inner">

        <!-- primary -->
        <main id="primary">

            <div class="genre-nav">
                <div class="genre-nav-link"><a class="is-active" href="<?php echo esc_url(get_post_type_archive_link('work')); ?>">すべて</a></div><!-- /.genre-nav-link -->
                <?php
                $genre_terms = get_terms('genre', array('hide_empty' => false));
                foreach ($genre_terms as $genre_term) :
                ?>
                    <div class="genre-nav-link"><a href="<?php echo esc_url(get_term_link($genre_term, 'genre')); ?>"><?php echo esc_html($genre_term->name); ?></a></div><!-- /.genre-nav-link -->
                <?php
                endforeach;
                ?>
            </div><!-- /.genre-nav -->

            <?php
            if (have_posts()) :
            ?>

                <!-- entries -->
                <div class="entries entries-work">
                    <?php
                    while (have_posts()) :
                        the_post();
                    ?>

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
                                    <div class="entry-item-tag"><?php echo esc_html(get_the_terms(get_the_ID(), 'genre')[0]->name); ?></div><!-- /.entry-item-tag -->
                                </div><!-- /.entry-item-meta -->
                                <h2 class="entry-item-title"><?php the_title(); ?></h2><!-- /.entry-item-title -->

                                <div class="entry-item-excerpt">
                                <?php
                                if(mb_strlen(get_field('overview'), 'UTF-8') >= 40){
                                    $content = mb_substr(get_field('overview'), 0, 40, 'UTF-8');
                                    echo $content . '......';
                                }else{
                                    the_field('overview');
                                }                                
                                ?>
                                </div><!-- /.entry-item-excerpt -->

                            </div><!-- /.entry-item-body -->

                        </a><!-- /.entry-item -->
                    <?php
                    endwhile;
                    ?>
                </div><!-- /.entries -->
                
                <?php get_template_part('template-parts/work_pagenation'); ?>

            <?php
            endif;
            ?>
        </main><!-- /primary -->

    </div><!-- /.inner -->
</div><!-- /.content -->

<?php get_footer(); ?>