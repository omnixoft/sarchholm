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
                                {{ __('translation::translation.add') }}
                            </a>

                        </div>

                        <div class="invoice-body">
                            <div class="table-responsive">
                                <table class="invoice-table table">
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
                                                            <translation-input
                                                                    initial-translation="{{ $value[$language] }}"
                                                                    language="{{ $language }}"
                                                                    group="{{ $group }}"
                                                                    translation-key="{{ $key }}"
                                                                    route="{{ config('translation.ui_url') }}">
                                                            </translation-input>
                                                        </td>
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
