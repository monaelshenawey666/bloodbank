
          <div class="form-group">
              <label for="name">Patient Name</label>
              {!! Form::text('patient_name',null,['class'=>'form-control']) !!}
          </div>

          <div class="form-group">
              <label for="name">Patient age</label>
              {!! Form::text('patient_age',null,['class'=>'form-control']) !!}
          </div>

          <div class="form-group">
              <label for="name">Patient phone</label>
              {!! Form::text('patient_phone',null,['class'=>'form-control']) !!}
          </div>

          <div class="form-group">
              <label for="name">Hospital name</label>
              {!! Form::text('hospital_name',null,['class'=>'form-control']) !!}
          </div>

          <div class="form-group">
              <label for="name">Bages Num</label>
              {!! Form::text('bages_num',null,['class'=>'form-control']) !!}
          </div>
          
          <div class="form-group">
              <label for="name">details</label>
              {!! Form::text('details',null,['class'=>'form-control']) !!}
          </div>

          <div class="form-group">
	    		  {!!Form::label('governorate_id', 'Governorate')!!}
	    		
            {!! Form::select('governorate_id', $governorates->pluck('name','id')->toArray(),null, [
                      'class'=>'form-control'
            ])!!}
          </div>
          

          <div class="form-group">
	    		  {!!Form::label('city_id', 'City')!!}
	    		
            {!! Form::select('city_id', $cities->pluck('name','id')->toArray(),null, [
                      'class'=>'form-control'
            ])!!}
          </div>

          <div class="form-group">
	    		  {!!Form::label('blood_type_id', 'Blood Type')!!}
	    		
            {!! Form::select('blood_type_id', $bloodTypes->pluck('name','id')->toArray(),null, [
                      'class'=>'form-control'
            ])!!}
          </div>

          


            <div class="form-group">
              <button class="btn btn-primary" type="submit">Submit</button>
            </div>