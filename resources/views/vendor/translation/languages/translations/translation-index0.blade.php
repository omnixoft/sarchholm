@extends('admin.main')
@section('content')
    <form action="{{ route('languages.translations.index', ['language' => $language]) }}" method="get">

    <div class="dash-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="invoice-panel">
                        <div class="act-title d-flex justify-content-between">
                            <h5>Translations</h5>

                            <a href="{{ route('admin.languages.translations.create', $language) }}" class="btn v3">
                                Add Translation
                            </a>

                        </div>

                        <div class="invoice-body">
                            <div class="table-responsive">
                                <table class="invoice-table table" id="language-table">
                                    <thead>
                                    <tr>
                                        <th class="w-1/5 uppercase font-thin">{{ __('translation::translation.group_single') }}</th>
                                        <th class="w-1/5 uppercase font-thin">{{ __('translation::translation.key') }}</th>
                                        <th class="uppercase font-thin">{{ config('app.locale') }}</th>
                                        <th class="uppercase font-thin">{{ $language }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($translations as $type => $items)

                                        @foreach($items as $group => $translations)

                                            @foreach($translations as $key => $value)

                                                @if(!is_array($value[config('app.locale')]))
                                                    <tr>
                                                        <td>{{ $group }}</td>
                                                        <td>{{ $key }}</td>
                                                        <td>{{ $value[config('app.locale')] }}</td>
                                                        <td>
                                                            <textarea class="edit_textarea form-control">{{ $value[$language] }}</textarea>
                                                            <button class="update_btn hidden" type="button" data-key="{{ $key }}" data-language="{{ $language }}" data-group="{{ $group }}" title="Update"><i class="la la-floppy-o" aria-hidden="true"></i></button>
                                                            <span class="check_icon hidden"><i class="la la-check-circle-o" aria-hidden="true"></i></span>
                                                        </td>
                                                        {{-- <td>
                                                            <translation-input
                                                                    initial-translation="{{ $value[$language] }}"
                                                                    language="{{ $language }}"
                                                                    group="{{ $group }}"
                                                                    translation-key="{{ $key }}"
                                                                    route="{{ config('translation.ui_url') }}">
                                                            </translation-input>
                                                        </td> --}}
                                                    </tr>
                                                @endif

                                            @endforeach

                                        @endforeach

                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
@endsection
@push('scripts')
<script type="text/javascript">
    (function($)
{
        "use strict";

        $(document).ready(function () {

            var dataSrc = [];

            var table = $('#language-table').DataTable({

                "order": [],
                'language': {
                    "search": '{{trans("file.search")}}',
                    'paginate': {
                        'previous': '{{trans("file.previous")}}',
                        'next': '{{trans("file.next")}}'
                    }
                },

                'select': {style: 'multi', selector: 'td:first-child'},
                'lengthMenu': [[5000,-1], [5000,"All"]], //Add more because of avoiding update issue
            });


            $(".edit_textarea").on('click',function(){
                console.log('ok');
                $(".update_btn").hide(); //for all
                $(this).siblings('.update_btn').show();
            });

            $(".update_btn").on('click',function(){
                var language = $(this).data('language');
                var key   = $(this).data('key');
                var group = $(this).data('group');
                var value = $(this).siblings('textarea').val();

                $(this).siblings('.check_icon').show();

                $.ajax({
                    url: "{{ route('admin.update.language') }}",
                    type: "GET",
                    data: {
                        language:language,
                        key:key,
                        group:group,
                        value:value
                    },
                    success: function (data) {
                        $(".update_btn").hide();
                        console.log(data);
                        setTimeout(function() {
                            $('.check_icon').fadeOut("slow");
                        }, 3000);
                    }
                });
            });

        });
})(jQuery);
</script>
@endpush
