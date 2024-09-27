@script
<script>
    $(document).ready(function () {
        var tags_input = $('#tags');
        var select_tags = $('#select_tags');
        var default_tags = tags_input.val();
        var default_data = null;

        if(tags_input.val() !== null && tags_input.val().length > 0){
            default_data = default_tags.split(',');
        }

        select_tags.select2({
            placeholder : 'Enter The Tags',
            tags : true ,
            data : default_data
        });

        select_tags.children('option').attr('selected' , true).trigger('change');
        
        $('#form').submit(function() {
            if(select_tags.val() !== null && select_tags.val().length > 0){
                var selectResource = select_tags.val().join(',');
                tags_input.val(selectResource);
                $wire.dispatch('tag-send', { tags:  tags_input.val() });
            }
        });
    });
</script>
@endscript