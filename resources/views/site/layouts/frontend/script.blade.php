

<script>
    $('.zekr-reset').on('click',function (){
        var real_count = $(this).parents('tr').siblings('tr').find('.zekr-count').text();
        $(this).parents('tr').siblings('tr').find('.count-down').text(real_count);
    });
    $('.text-info').on('click',function (){
        $(this).siblings('.modal').modal('show');
    });
</script>
