

            <div class="form-group">
                <label for="name">Name</label>
                    {!! Form::text('name',null,['class'=>'form-control']) !!}
                    
                <label for="governorate_id">Governorate</label>
                    {!! Form::select('governrate_id', $governrates->pluck('name','id')->toArray(),null, [
                      'class'=>'form-control'
                    ])!!}
              </div>   
              <div class="form-group">
                <button class="btn btn-primary" type="submit">Submit</button>
              </div>
      