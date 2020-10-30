@extends('layouts.app')

@section('content')

   <div class="container">

      <div class="card">

         <div class="card-header">
            <h5>Create a Client</h5>
         </div>

         <div class="card-body">
            <form action="{{ route('clients.store') }}" method="POST">
               @csrf

               @include('clients._form', ['submitButtonText' => 'Add Client'])

               <a href="{{ route('clients.index') }}" class="btn btn-dark btn-sm">Back to List of clients...</a>
            </form>
         </div>

      </div>

   </div>

@endsection
