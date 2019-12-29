<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($user->name) ? $user->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="control-label">{{ 'Email' }}</label>
    <input class="form-control" name="email" type="email" id="email" value="{{ isset($user->email) ? $user->email : ''}}" >
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
    <label for="password" class="control-label">{{ 'Password' }}</label>
    <input class="form-control" name="password" type="password" id="password" >
    {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('role') ? 'has-error' : ''}}">
    <label for="role" class="control-label">{{ 'Role' }}</label>
    @if ( count($thisUserRoles) == 0 )
        <select name="roles[]" multiple="true">
            @foreach ( $roles as $role )              
                <option value="{{ $role }}">{{ $role }}</option>
           @endforeach
        </select>
    @else
        <select name="roles[]" multiple="true" class="form-control">
            @foreach ( $roles as $role )
                @php $foundFlag = false; @endphp
                @foreach ( $thisUserRoles as $thisUserRole )
                    @if ( $role == $thisUserRole->role_name )
                        @php 
                            $foundFlag = true;
                            break; 
                        @endphp
                    @endif
                @endforeach
                @if ( $foundFlag == true )
                    <option value="{{ $role }}" selected>{{ $role }}</option>
                @else 
                    <option value="{{ $role }}">{{ $role }}</option>
                @endif
           @endforeach
        </select>
    @endif
    
    <!-- <select name="roles[]" class="form-control" id="role" multiple="">
    @foreach ($roles as $role)
        <option value="{{ $role }}">{{ $role }}</option>
    @endforeach -->
</select>
    {!! $errors->first('role', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
