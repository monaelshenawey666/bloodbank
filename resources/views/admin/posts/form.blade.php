

           <!-- <div class="form-group">
                <label for="name">Name</label>
                {!! Form::text('name',null,['class'=>'form-control' ]) !!}
              </div>-->   
              
      <div class="form-group">
	    		  {!!Form::label('category_id', 'Category')!!}
	    		
            {!! Form::select('category_id', $categories->pluck('name','id')->toArray(),null, [
                      'class'=>'form-control'
            ])!!}
      </div>
                
       <div class="form-group">
          <label for="user_id">UserName</label>
    
            {!! Form::select('user_id', $users->pluck('name','id')->toArray(),null, [
                      'class'=>'form-control'
                    ])!!}
	    	</div>

        <div class="form-group">
	    		{!!Form::label('title', 'Title')!!}
	    		{!!Form::text('title', null, ['class'=>'form-control'])!!}
	    	</div>

        <div class="form-group">
	    		{!!Form::label('image', 'Image')!!}
	    		{!!Form::file('image',  ['class'=>'form-control'])!!}
        </div>
        
	    	<div class="form-group">
	    		{!!Form::label('content', 'Content')!!}
	    		{!!Form::textarea('content', null, ['class'=>'form-control'])!!}
	    	</div>



	    

	    

	    	