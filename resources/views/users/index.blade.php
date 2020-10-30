@extends('layouts.app')

@section('content')
<div class="container">

   @if (session()->has('message'))
      <div class="alert alert-dismissable alert-success">
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
         </button>
         <strong>
            {!! session()->get('message') !!}
         </strong>
      </div>
   @endif

   <div class="card">

      <div class="card-header">
         <h4 style="display:inline-block"> List of Users </h4>
         <a href="{{ route('users.create') }} " class="btn btn-dark btn-sm float-right">Add New User</a>
      </div>

      <div class="card-body table-responsive">
         @if (count($users) > 0)
            <table class="table table-sm table-hover">
               {{-- <caption>List of Users</caption> --}}
               <thead class="thead-light">
                  <tr>
                     <th scope="col">First Name</th>
                     <th scope="col">Last Name</th>
                     <th scope="col">DNI</th>
                     <th scope="col">ID/File</th>
                     <th scope="col">Email</th>
                     <th scope="col">Action</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($users as $user)
                     <tr>
                        <td> {{ $user->first_name }} </td>
                        <td> {{ $user->last_name }} </td>
                        <td> {{ $user->dni }} </td>
                        <td> {{ $user->file }} </td>
                        <td> {{ $user->email }} </td>
                        <td>
                           <a href="{{ route('users.edit', $user) }} " class="btn btn-info btn-sm">Edit</a>
                        </td>
                     </tr>
                  @endforeach
               </tbody>
            </table>

            <!-- Pagination -->
            <div class="d-flex justify-content-center pagination-sm">
               {!! $users->links() !!}
            </div>

         @else
            <h5> No Users to display yet. </h5>
         @endif
      </div>
   </div>
</div>
@endsection
