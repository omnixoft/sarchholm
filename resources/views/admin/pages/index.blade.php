@extends('admin.main')
@section('content')
    <div class="dash-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="invoice-panel">
                        <div class="act-title d-flex justify-content-between">
                            <h5>Pages</h5><br>

                            {{-- <a href="{{route('admin.currencies.create')}}" class="btn v3">Add Currency</a> --}}
                        </div>

                        <div class="invoice-body">
                            <div class="table-responsive">
                                <table class="invoice-table table" id="currency_table">
                                    <thead>
                                    <tr class="invoice-headings">
                                        <th style="max-width:100px">Action</th>
                                        <th>Pages</th>
                                        <th>Template</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex justify-content-end">
                                                    <button class="edit btn btn-info btn-sm" id="editPage" data-toggle="modal" data-target="#exampleModal" data-id="Properties">
                                                        <i class="la la-edit"></i>
                                                    </button>
                                                </div>
                                            </td>
                                            <td>Properties</td>
                                            <td id="layouts">{{strtoupper(env('PROPERTIES_TEMPLATE'))}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Choose Page Layout</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="pageSubmit">
                @csrf
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Page Name:</label>
                  <input type="text" name="page" class="form-control" value="Properties" readonly>
                </div>
                <div class="form-group">
                    <label>Choose Template: </label>
                    <select class="listing-input hero__form-input form-control custom-select" name="layout">
                        <option value="">Select</option>
                        <option value="default" {{env('PROPERTIES_TEMPLATE')=='default' ? 'selected' : ''}}>Default</option>
                        <option value="left-map" {{env('PROPERTIES_TEMPLATE')=='left-map' ? 'selected' : ''}}>Left Map</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">UPDATE</button>
            </div>
        </form>

          </div>
        </div>
      </div>
@endsection
@push('scripts')
<script>
    (function($){
        "use strict";
        $('#currency_table').DataTable();

        $('body').on('click', '#editPage', function (event) {

            event.preventDefault();
            var id = $(this).data('id');
            // console.log(id)
            // $.get('color/' + id + '/edit', function (data) {
            //     $('#userCrudModal').html("Edit category");
            //     $('#submit').val("Edit category");
            //     $('#practice_modal').modal('show');
            //     $('#color_id').val(data.data.id);
            //     $('#name').val(data.data.name);
            // })
        });

        $('.pageSubmit').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                url: "{{route('admin.pages.store')}}",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                success: function (data) {
                    // console.log(data.layout);
                    $('#exampleModal').modal('hide');
                    $('#layouts').text(data.layout.toUpperCase());
                }
            });
        });
    })(jQuery);
</script>

@endpush
