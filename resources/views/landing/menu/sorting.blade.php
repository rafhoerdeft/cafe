<div>
    <div class="select-option" wire:ignore>
        <select class="sorting w-100">
            @foreach ($sorting_option as $key => $item)
                <option value="{{ $key }}" {{ $sorting_menu == $key ? 'selected' : '' }}>
                    {{ $item }}</option>
            @endforeach
        </select>
    </div>
</div>

@push('css_plugin')
    <link rel="stylesheet" href="{{ asset('landing/css/nice-select.css') }}" type="text/css">
@endpush

@push('js_plugin')
    <script src="{{ asset('landing/js/jquery.nice-select.min.js') }}"></script>
@endpush

@push('js_script')
    <script>
        $('.sorting').niceSelect();
    </script>

    <script>
        $('.sorting').change(function() {
            let id = $(this).val();
            Livewire.emit('changeSorting', id);
        })
    </script>
@endpush
