<form  method="POST" action="{{ route('scenario_mapping.update',$mappingId) }}" enctype="multipart/form-data" >
    @method("PUT")
    @csrf
    <div class="row pb-2">
        <div class="col-md-12 pb-2">
            <label>{{__('gobal.Scenario Name')}}<span class="required">*</span></label>
            <select name="scenario_id" class="form-control" required>
                <option>{{__('gobal.Select Scenario Name')}}</option>
                @for ($i = 0; $i < count($scenario); $i++) 
                <option value="{{$scenario[$i]->id}}" {{ $scenario[$i]->id == $scenarioId ? 'Selected' : '' }}>{{ucwords($scenario[$i]->name)}}</option>
                 @endfor
                
            </select>
        </div>
        <div class="btn-wrapper d-flex gap-2 mt-4">
            <button type="submit" class="btn btn-save d-flex align-items-center gap-2"><i class="fas fa-check fs-4"></i>{{__('gobal.save')}}</button>
        </div>
    </div>
</form>