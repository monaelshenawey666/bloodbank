
          <div class="form-group">
              <label for="name">About app</label>
              {!! Form::text('about_app',null,['class'=>'form-control' ]) !!}

            </div>   

            <div class="form-group">
              {!!Form::label('phone', 'phone')!!}
              {!!Form::text('phone', null, ['class'=>'form-control'])!!}
            </div>
            <div class="form-group">
              {!!Form::label('fb_link', 'Facebook')!!}
              {!!Form::text('fb_link', null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
              {!!Form::label('insta_link', 'insta')!!}
              {!!Form::text('insta_link', null, ['class'=>'form-control'])!!}
            </div>


            <div class="form-group">
				    		<label for="twitet_link">Twitter</label>
				    		{!!Form::text('twiter_link',null, ['class'=>'form-control'])!!}
				    </div>

            <div class="form-group">
              <button class="btn btn-primary" type="submit">Update</button>
            </div>