@extends('layouts.admin')

@section('content')

    @if(Session :: has('deleted_user'))

        <h3 class="bg-danger text-success">{{session('deleted_user')}}</h3>

     @endif


     <h1>User Index</h1>

    <table class="table">
        <thead>
          <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>Name</th>
             <th>Email</th>
            <th>role_id</th>
            <th>Status</th>
            <th>Created_at</th>
            <th>Updated_at</th>

          </tr>
        </thead>
        <tbody>

        @if($users)

            @foreach($users as $user)
          <tr>
            <td>{{$user->id}}</td>
            <td><img height="50" src="{{$user->photo ? $user->photo->file : 'http://placehold.it/400x400'}}"></td>
            <td><a href="{{route('admin.users.edit',$user->id)}}">{{$user->name}}</a></td>
            <td>{{$user->email}}</td>
            <td>{{$user->role ? $user->role->name : 'no user role'}}</td>
            <td>{{$user->is_active == 1 ? 'Active' : 'Not Active' }}</td>
            <td>{{$user->created_at->diffForhumans()}}</td>
            <td>{{$user->updated_at->diffForhumans()}}</td>
          </tr>

          @endforeach
        @endif
        </tbody>
      </table>


@endsection
