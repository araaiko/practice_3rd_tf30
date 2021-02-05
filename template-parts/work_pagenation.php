<?php if (paginate_links()) : ?>
    <!-- pagenation -->
    <div class="pagenation">
        <?php
        echo wp_kses_post(
            paginate_links(
                array(
                    'end_size'  => 0,
                    'mid_size'  => 1,
                    'prev_next' => true,
                    'prev_text' => '<i class="fas fa-angle-left"></i>',
                    'next_text' => '<i class="fas fa-angle-right"></i>',
                )
            )
        );
        ?>
    </div><!-- /.pagenation -->
<?php endif; ?>