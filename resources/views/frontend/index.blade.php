@extends('frontend.main')
@section('content')
    <!--Hero section starts-->
    @include('frontend.includes.hero')
    <!--Hero section ends-->
    <!--Popular Cities starts>
    <!--Popular Cities ends>
    <!--Popular Property starts-->
    @include('frontend.includes.popular-properties')
    @include('frontend.includes.popular-city')

    <!--Popular Property ends-->
    @include('frontend.includes.featured-property')
    <!--Featured Property ends-->
    <!--Trending events starts-->
    @include('frontend.includes.recent-properties')
    <!--Trending events ends-->
    <!--Team section starts-->
    @include('frontend.includes.agents')
    <!--Team section ends-->
    <!--News section starts-->
    @include('frontend.includes.news')
    <!--News section ends-->
@endsection
@push('script')
<script>
    $(document).on('change','#state',function(){
        var state = $(this).val();
        $.ajax({
            method:'post',
            url: '{{route('state.city')}}',
            data: {state:state,"_token":"{{csrf_token()}}"},
            dataType:'html',
            success:function(response){
                $('#city').html(response);
                $('#city').selectpicker('refresh');
            }
        });
    });
</script>

<script>
    $(document).on('change','#propType',function(){
        var propertyType = $(this).val();
        // alert(propertyType);
        if(propertyType == 1)
        {
            $("#bed").show();
            $("#bath").show();
        }else{
            $("#bed").hide();
            $("#bath").hide();
        }
    });

    $(function() {
    var minPrice = 0;
    var maxPrice = 20000;
    var minArea = 0;
    var maxArea = 500;
    var currentMinArea = $("#minAreaSize").val();;
    var currentMaxArea = $("#maxAreaSize").val();;
    var currentMinValue = $("#minPropPrice").val();
    var currentMaxValue = $("#maxPropPrice").val();

    $( "#slider-range" ).slider({
        range: true,
        min: minPrice,
        max: maxPrice,
        values: [ currentMinValue, currentMaxValue ],
        slide: function( event, ui ) {
            $( "#amount" ).val(ui.values[ 0 ] + " - " + ui.values[ 1 ] );
            $("#min").val(ui.values[ 0 ]);
            $("#max").val(ui.values[ 1 ]);
            currentMinValue = ui.values[ 0 ];
            currentMaxValue = ui.values[ 1 ];
            // alert(currentMinValue,currentMaxValue);
        },
        stop: function( event, ui ) {
            currentMinValue = ui.values[ 0 ];
            currentMaxValue = ui.values[ 1 ];

            // console.log(currentMaxValue,currentMinValue);
        }
    });

    $( "#slider-range_area" ).slider({
        range: true,
        min: minArea,
        max: maxArea,
        values: [ currentMinArea, currentMaxArea ],
        slide: function( event, ui ) {
            $( "#area" ).val(ui.values[ 0 ] + " - " + ui.values[ 1 ] );
            $("#minArea").val(ui.values[ 0 ]);
            $("#maxArea").val(ui.values[ 1 ]);
            currentMinArea = ui.values[ 0 ];
            currentMaxArea = ui.values[ 1 ];
            // alert(currentMinValue,currentMaxValue);
        },
        stop: function( event, ui ) {
            currentMinArea = ui.values[ 0 ];
            currentMaxArea = ui.values[ 1 ];
        }
    });

    $( "#amount" ).val($( "#slider-range" ).slider( "values", 0 ) +
"-" + $( "#slider-range" ).slider( "values", 1 ) );


   $( "#area" ).val($( "#slider-range_area" ).slider( "values", 0 ) +
"-" + $( "#slider-range_area" ).slider( "values", 1 ) );

});

</script>

<script>
    $(document).ready(function(){

     $('#city_name').keyup(function(){
            var query = $(this).val();
            if(query != '')
            {
             var _token = $('input[name="_token"]').val();
             $.ajax({
              url:"{{ route('autocomplete.fetch') }}",
              method:"POST",
              data:{query:query, _token:_token},
              success:function(data){
               $('#cityList').fadeIn();
                        $('#cityList').html(data);
              }
             });
            }
        });

        $(document).on('click', 'li', function(){
            var text = $(this).text();
            var city = text.substring(0, text.indexOf(','));
            
            $('#city_name').val(city);
            $('#cityList').fadeOut();
        });

    });
    </script>
@endpush
