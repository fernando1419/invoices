@extends('layouts.app')

@section('content')

   <div class="container">

      <div class="card">

         <div class="card-header">
            <h5>Edit a Client</h5>
         </div>

         <div class="card-body">
            <form action="{{ route('clients.update', $client) }}" method="POST">
               @csrf
               @method('PUT')

               @include('clients._form', ['submitButtonText' => 'Update Client'])

               <a href="{{ route('clients.index') }}" class="btn btn-dark btn-sm float-left">Back to List of clients...</a>
            </form>
         </div>

      </div>

   </div>

@endsection
