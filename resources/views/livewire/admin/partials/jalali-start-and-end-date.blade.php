<script src="{{ asset('admin-assets/jalalidatepicker/persian-date.min.js') }}"></script>
<script src="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.js') }}"></script>
<script>
    $(document).ready(function () { 
        $('#start_date_at').persianDatepicker({
            format: 'YYYY/MM/DD',
            altField: '#start_date',
            timePicker: {
                enabled: true,
                meridiem: {
                enabled: true
                }
    },
        });
        $('#end_date_at').persianDatepicker({
            format: 'YYYY/MM/DD',
            altField: '#end_date',
            timePicker: {
                enabled: true,
                meridiem: {
                enabled: true
                }
    },
        });
    });
</script>