@extends('admin.main')
@section('content')
    <div class="dash-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="invoice-panel">
                        <div class="act-title d-flex justify-content-between">
                            <h5>Languages</h5><br>

                            <a href="{{route('admin.languages.create')}}" class="btn btn-primary">Add</a>
                        </div>

                        <div class="invoice-body">
                            <div class="table-responsive">
                                <table class="invoice-table table">
                                    <thead>
                                    <tr>
                                        <th>{{ __('translation::translation.language_name') }}</th>
                                        <th>{{ __('translation::translation.locale') }}</th>
                                        <th>Default</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($languages as $language )
                                        <tr>
                                            <td>
                                                {{ strtoupper($language['name']) }}
                                            </td>
                                            <td>
                                                <a href="{{ route('languages.translations.index', $language) }}">
                                                    {{ strtoupper($language['locale']) }}
                                                </a>
                                            </td>
                                            <td>@if($language->locale == Session::get('currentLocal')) <span class='p-2 badge badge-success'>Default</span> @else <span class='p-2 badge badge-dark'>None</span> @endif</td>
                                            <td>
                                                {{-- <a href="{{route('admin.languages.edit',$language['locale'])}}" class="edit btn btn-info btn-sm"><i class="la la-edit"></i></a> --}}
                                                <button class="btn btn-danger btn-sm lang_del" data-id="{{$language['locale']}}"><i class="la la-trash"></i></button>
                                            </td>
                                        </tr>
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
@endsection
@push('scripts')
    <script>
         (function($) {
            "use strict";



            $(document).ready(function() {
                $(".lang_del").click(function(){
                    var proceed = confirm("Are You Sure To Delete ?");
                    if (proceed) {
                        var langVal = $(this).attr("data-id");
                        // alert(langVal);
                        $.ajax({
                            url: "{{route('admin.delete.language')}}",
                            method: "GET",
                            data: {langVal:langVal},
                            success: function (data) {
                               alert(data);
                               location.reload();
                                // if (data =='success') {
                                //     window.location.href = "English";
                                // }
                            }
                        })
                    }
                });
            });

        })(jQuery);
    </script>
@endpush
