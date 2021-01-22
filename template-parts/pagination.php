<?php if (paginate_links()) : //ページが1ページ以上あれば以下を表示 
?>
    <!-- pagenation -->
    <div class="pagenation">

        <?php
        echo
        paginate_links(
            array(
                'end_size' => 1,
                'mid_size' => 1,
                'prev_next' => true,
                'prev_text' => '<i class="fas fa-angle-left"></i>', //fontawesome使用
                'next_text' => '<i class="fas fa-angle-right"></i>', //fontawesome使用
            )
        );
        ?>

    </div><!-- /pagenation -->
<?php endif; ?>