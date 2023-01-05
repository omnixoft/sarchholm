<label>Project Building:</label>@include('required')
<select name="building_id"
    class="listing-input hero__form-input  form-control custom-select {{ $errors->has('building_id') ? 'has-error' : '' }}">
    <option selected disabled hidden>Select Project Building</option>
    @foreach ($data as $b)
        <option value="{{$b->id}}">{{$b->name}}</option>
    @endforeach
</select>
@error('building_id')
    <p class="text-danger">Project Building is required</p>
@enderror
