@extends('layouts.app')

@section('content')

   <div class="container">

      <div class="card">

         <div class="card-header">
            <h5>Create a User</h5>
         </div>

         <div class="card-body">
            <form action="{{ route('users.store') }}" method="POST">
               @csrf

               @include('users._form', ['submitButtonText' => 'Add User'])

               <a href="{{ route('users.index') }}" class="btn btn-dark btn-sm float-left">Back to List of users...</a>
            </form>
         </div>

      </div>

   </div>

@endsection
