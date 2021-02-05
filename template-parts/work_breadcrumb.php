<!-- 制作実績のパンくず -->
<?php if (function_exists('bcn_display')) : ?>
    <div class="work-breadcrumb">
        <div class="inner">
            <!-- breadcrumb -->
            <div class="breadcrumb">
                <?php bcn_display(); ?>
            </div><!-- /.breadcrumb -->
        </div><!-- /.inner -->
    </div><!-- /.work-breadcrumb -->
<?php endif; ?>