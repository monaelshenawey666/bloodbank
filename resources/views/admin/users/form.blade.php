<?php
$roles = $role->pluck('display_name', 'id')->toArray();

?>
        
        
        <div class="form-group">
	    		<label for="name">Name</label>
	    		{!!Form::text('name', null, ['class'=>'form-control'])!!}
        </div>
        
	    	<div class="form-group">
	    		<label for="email">Email</label>
	    		{!!Form::text('email', null, ['class'=>'form-control'])!!}
        </div>

        
	    	<div class="form-group">
	    		<label for="password">Password</label>
	    		{!!Form::password('password', ['class'=>'form-control'])!!}
        </div>
        <div class="form-group">
	    		<label for="password_confirmation">Password Confirm</label>
	    		{!!Form::password('password_confirmation', ['class'=>'form-control'])!!}
	    	</div>

	    	<div class="form-group">
	    		<label for="roles_list">users Roles</label>
	    		{!!Form::select('roles_list[]', $roles, null,
	    		 ['class'=>'form-control select2',
	    		  'multiple' => 'multiple'	
	    		 ])!!}
	    	</div>