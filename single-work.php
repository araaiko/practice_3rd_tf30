<?php

/**
 * Single Work
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

            <?php
            if (have_posts()) :
                while (have_posts()) :
                    the_post();
            ?>

                    <!-- entry -->
                    <article <?php post_class(array('entry', 'entry-work')); ?>>

                        <!-- entry-header -->
                        <div class="entry-header">
                            <div class="entry-label"><a href="<?php echo esc_url(get_term_link(get_the_terms(get_the_ID(), 'genre')[0], 'genre')); ?>"><?php echo esc_html(get_the_terms(get_the_ID(), 'genre')[0]->name); ?></a></div><!-- /entry-item-tag -->
                            <h1 class="entry-title"><?php the_title(); ?></h1><!-- /entry-title -->

                            <!-- entry-img -->
                            <div class="entry-img">
                                <?php
                                if (has_post_thumbnail()) {
                                    the_post_thumbnail('full');
                                }
                                ?>
                            </div><!-- /entry-img -->
                        </div><!-- /entry-header -->

                        <div class="entry-work-body">

                            <div class="entry-work-content"><?php echo nl2br(esc_html(get_field('overview'))); ?></div><!-- /.entry-work-content -->
                            <div class="entry-work-table">
                                <table>
                                    <?php if (get_field('company')) : ?>
                                        <tr>
                                            <th>会社名</th>
                                            <td><?php the_field('company'); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php if (get_field('url')) : ?>
                                        <tr>
                                            <th>サイトURL</th>
                                            <td><?php the_field('url'); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php if (get_field('position')) : ?>
                                        <tr>
                                            <th>担当範囲</th>
                                            <td><?php the_field('position'); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                </table>
                            </div><!-- /.entry-work-table -->
                            
                        </div><!-- /.entry-work-content -->

                        <div class="entry-work-btn">
                            <a class="btn" href="<?php echo esc_url(get_post_type_archive_link('work')); ?>">一覧に戻る</a>
                        </div><!-- /.entry-work-btn -->

                        <?php get_template_part('template-parts/work_entry_related'); ?>

                    </article><!-- /entry -->

            <?php
                endwhile;
            endif;
            ?>

        </main><!-- /primary -->

    </div><!-- /inner -->
</div><!-- /content -->

<?php get_footer(); ?>