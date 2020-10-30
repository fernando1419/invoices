@extends('layouts.app')

@section('content')

   <div class="container">

      <div class="card">

         <div class="card-header">
            <h5>Edit a User</h5>
         </div>

         <div class="card-body">
            <form action="{{ route('users.update', $user) }}" method="POST">
               @csrf
               @method('PUT')

               @include('users._form', ['submitButtonText' => 'Update User'])

               <a href="{{ route('users.index') }}" class="btn btn-dark btn-sm float-left">Back to List of users...</a>
            </form>
         </div>

      </div>

   </div>

@endsection
