<style>
    .update-nag
    {
        display:none !important;
    }

    .wp-list-table td.column-published {
        width: 50px;
    }

    .wp-list-table #type {
        width: 100px;
    }

    .wp-list-table #id {
        width: 50px;
    }

    .wp-list-table #last_update {
        width: 120px;
    }

    .wp-list-table #published {
        text-align: center;
        width: 100px;
    }
</style>
<div class="wrap">
    <form method="post">
        <div id="icon-themes" class="icon32"></div>
        <h3>WPGrabber > Список лент</h3><hr>
		
        <?php $wpgrabberTable->search_box('поиск', 'search_id'); ?>
        <?php echo $wpgrabberTable->display(); ?>
    </form>
