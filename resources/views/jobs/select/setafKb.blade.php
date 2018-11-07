@foreach ($users as $user)
	<option value="{{$user->id}}">{{$user->user}}</option>
@endforeach
@if (!empty($users2))
@foreach ($users2 as $user)

	<option value="{{$user->id}}">{{$user->user}}</option>
@endforeach
@endif
@if (!empty($users3))
@foreach ($users3 as $user)
	<option value="{{$user->id}}">{{$user->user}}</option>
@endforeach
@endif
@if (!empty($users4))
@foreach ($users4 as $user)
	<option value="{{$user->id}}">{{$user->user}}</option>
@endforeach
@endif
@if (!empty($users5))
@foreach ($users5 as $user)
	<option value="{{$user->id}}">{{$user->user}}</option>
@endforeach
@endif
@if (!empty($users6))
@foreach ($users6 as $user)
	<option value="{{$user->id}}">{{$user->user}}</option>
@endforeach
@endif

