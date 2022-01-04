@push('css-external')
    <link rel="stylesheet" href="{{ asset('vendor/prism/css/' . config('prism.theme') . '.css') }}">
@endpush

@push('js-external')
    <script src="{{ asset('vendor/prism/js/prism.js') }}"></script>
@endpush

@push('js-internal')
    <script>
        $(function() {
            $("button[class='copy-to-clipboard-button']").addClass("{{ config('prism.copy_button.class') }}");
        })
    </script>
@endpush
