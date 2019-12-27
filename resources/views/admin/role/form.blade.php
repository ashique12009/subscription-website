<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($role->name) ? $role->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('permissions') ? 'has-error' : ''}}">
    <label for="permissions" class="control-label">{{ 'Permission' }}</label>
    
    @if ( count($thisRolePermissions) == 0 )
    	<select name="permissions[]" multiple="true">
	    	@foreach ( $allPermissions as $all_permission )	    		 
	    		<option value="{{ $all_permission }}">{{ $all_permission }}</option>
		   @endforeach
	    </select>
    @else
    	<select name="permissions[]" multiple="true">
	    	@foreach ( $allPermissions as $all_permission )
	    		@php $foundFlag = false; @endphp
    			@foreach ( $thisRolePermissions as $thisRolePermission )
    				@if ( $all_permission == $thisRolePermission->permission_name )
    					@php 
    						$foundFlag = true;
    						break; 
    					@endphp
    				@endif
    			@endforeach
    			@if ( $foundFlag == true )
    				<option value="{{ $all_permission }}" selected>{{ $all_permission }}</option>
    			@else 
    				<option value="{{ $all_permission }}">{{ $all_permission }}</option>
    			@endif
		   @endforeach
	    </select>
    @endif
    
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
