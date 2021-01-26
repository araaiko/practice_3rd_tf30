<!--==  ウィジェットを使ったサイドバーの検索欄表示に使用  ==-->
<!-- widget_search -->
<div class="widget widget_search">
    <div class="widget-title">検索</div>
    <!-- search-form -->
    <form method="get" class="search-form" action="<?php echo home_url('/'); ?>">
        <input type="search" class="search-field" value="" placeholder="キーワード" name="s" id="s">
        <button type="submit" class="search-submit"><i class="fas fa-search"></i></button>
    </form><!-- /search-form -->
</div><!-- /widget_search -->