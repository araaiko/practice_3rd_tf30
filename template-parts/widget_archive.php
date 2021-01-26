<!-- widget_archive -->
<div class="widget widget_archive">
    <div class="widget-title">アーカイブ</div>
    <ul>
        <?php
        //初期値なので$argsは書かなくてもOK
        $args = array(
            'type' => 'monthly',
            'limit' => '',
            'format' => 'html',
            'before' => '',
            'after' => '',
            'show_post_count' => false,
            'echo' => 1,
            'order' => 'DESC',
            'post_type' => 'post'
        );
        wp_get_archives($args);
        ?>
    </ul>
</div><!-- /widget_archive -->