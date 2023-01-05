<div class="row">
    <div class="col-md-12">

        <div class="db-add-list-wrap">
            <div class="act-title">
                {{-- <h5>Edit Building :</h5> --}}
            </div>


            <div class="db-add-listing">
                <form action="{{route('admin.projects.buildings.update',[$project_id,$projectBuilding->id])}}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="local" value="{{$locale}}">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Terms:</label>@include('required')
                                @php
                                    $selected = "";
                                    $term_ids = json_decode($projectBuildingTranslation->payment_term_ids);
                                @endphp
                                <select name="payment_term_ids[]" multiple="multiple"
                                    class="listing-input hero__form-input  form-control custom-select {{ $errors->has('building_id') ? 'has-error' : '' }}">
                                    @foreach ($terms as $b)
                                        @foreach ($term_ids as $term)
                                           @if ($b->id == $term)
                                                @php
                                                    $selected = 'selected';
                                                @endphp
                                           @endif
                                        @endforeach
                                        <option value="{{ $b->id }}" {{ $selected }} >{{ $b->name }}</option>
                                    @endforeach
                                </select>
                                @error('payment_term_ids')
                                    <p class="text-danger">Payment term is required</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Name:</label>
                                <input type="text" name="name" class="form-control filter-input" placeholder="Name" value="{{isset($projectBuildingTranslation->name) ? $projectBuildingTranslation->name : ''}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Capacity:</label>
                                <input type="text" name="capacity" class="form-control filter-input" placeholder="Capacity" value="{{isset($projectBuildingTranslation->capacity) ? $projectBuildingTranslation->capacity : ''}}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Description:</label>
                                <input type="text" name="description" class="form-control filter-input" placeholder="Capacity" value="{{isset($projectBuildingTranslation->description) ? $projectBuildingTranslation->description : ''}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Code:</label>
                                <input type="text" name="code" class="form-control filter-input" placeholder="Capacity" value="{{isset($projectBuildingTranslation->code) ? $projectBuildingTranslation->code : ''}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Status:</label>@include('required')
                                <select name="status"
                                    class="listing-input hero__form-input  form-control custom-select multiple {{ $errors->has('building_id') ? 'has-error' : '' }}">
                                    <option selected disabled hidden>Select Availability Status</option>
                                    <option value="1" {{ $projectBuildingTranslation->status == 1 ? 'selected' : '' }} >Avalable</option>
                                    <option value="0" {{ $projectBuildingTranslation->status == 0 ? 'selected' : '' }} >Not Avalable</option>
                                </select>
                                @error('status')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-5">
                            <div class="add-btn">
                                <button class="btn v3">SAVE</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
