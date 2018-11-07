{{-- <option disabled>Pilih </option> --}}
@foreach ($users as $user)
@if ($user->status != 2)
	<option value="{{$user->id}}">{{$user->user}}</option>
@endif
@endforeach
@if (!empty($users2))
@foreach ($users2 as $user)
@if ($user->status != 2)
	<option value="{{$user->id}}">{{$user->user}}</option>
@endif
@endforeach
@endif
@if (!empty($users3))
@foreach ($users3 as $user)
@if ($user->status != 2)
	<option value="{{$user->id}}">{{$user->user}}</option>
@endif
@endforeach
@endif
@if (!empty($users4))
@foreach ($users4 as $user)
@if ($user->status != 2)
	<option value="{{$user->id}}">{{$user->user}}</option>
@endif
@endforeach
@endif
@if (!empty($users5))
@foreach ($users5 as $user)
@if ($user->status != 2)
	<option value="{{$user->id}}">{{$user->user}}</option>
@endif
@endforeach
@endif
@if (!empty($users6))
@foreach ($users6 as $user)
@if ($user->status != 2)
	<option value="{{$user->id}}">{{$user->user}}</option>
@endif
@endforeach
@endif

