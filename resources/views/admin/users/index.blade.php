@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Users</div>

            

                <table class="table">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th>Action</th>
                    </tr>
                        @foreach($users as $user)
                    <tr>
                        <td style="row"></td>
                        <td> {{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            {{implode(', ',$user->roles()->get()->pluck('name')->toArray())}}
                        </td>
                        <td>
                        @can('edit-users')
                            <a href="{{route('admin.users.edit',$user->id)}}" class="float-left" > <button  type="button" class="btn btn-primary">Edit </button> </a>
                        @endcan
                        
                           <form action="{{route('admin.users.destroy',$user)}}" method="post" class="float-left"> 
                           @csrf
                               {{ method_field('DELETE')}}
                                 <button  type="submit" class="btn btn-warning" >Delete </button> 

                           </form>
                        </td>
                    </tr>
                       @endforeach

                </table>
                   
                </div>
            </div>
        </div>
    </div>

@endsection
