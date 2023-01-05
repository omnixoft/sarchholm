<!--pagination starts-->
@if ($paginator->hasPages())
<div class="post-nav nav-res pt-50  ">
    <div class="row">
        <div class="col-md-8 offset-md-2  col-xs-12 ">
            <div class="page-num text-center">
                <ul>
                    @if ($paginator->onFirstPage())
                        <li class="disabled"><a href="#"><i class="lnr lnr-chevron-left"></i></a></li>
                    @else
                        <li class="active"><a href="{{ $paginator->previousPageUrl() }}"><i class="lnr lnr-chevron-left"></i></a></li>
                    @endif


                        @foreach ($elements as $element)
                            @if (is_string($element))
                                <li class="disabled">{{ $element }}</li>
                            @endif

                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    @if ($page == $paginator->currentPage())
                                        <li class="active">
                                            <a class="">{{ $page }}</a>
                                        </li>
                                    @else
                                        <li class="">
                                            <a class="" href="{{ $url }}">{{ $page }}</a>
                                        </li>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach




                    @if ($paginator->hasMorePages())
                        <li><a href="{{ $paginator->nextPageUrl() }}"><i class="lnr lnr-chevron-right"></i></a></li>
                    @else
                        <li class="disabled"><a href="#"><i class="lnr lnr-chevron-right"></i></a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
@endif
<!--pagination ends-->