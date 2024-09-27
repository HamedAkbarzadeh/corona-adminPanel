@if (session('toast-error'))
    <section class="toast" data-delay="5000">

        <section class="toast-body py-3 d-flex justify-content-between bg-danger text-white">
            <strong class="">{{ session('toast-error') }}</strong>
            <button type="button" class="close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </section>
    </section>

    <script>
        $(document).ready(function() {
            $('.toast').toast('show');
        })
    </script>
@endif
