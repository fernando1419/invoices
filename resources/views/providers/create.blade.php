@extends('layouts.app')

@section('content')

   <div class="container">

      <div class="card">

         <div class="card-header">
            <h5>Create a Provider</h5>
         </div>

         <div class="card-body">
            <form action="{{ route('providers.store') }}" method="POST">
               @csrf

               @include('providers._form', ['submitButtonText' => 'Add Provider'])

               <a href="{{ route('providers.index') }}" class="btn btn-dark btn-sm">Back to List of providers...</a>
            </form>
         </div>

      </div>

   </div>

@endsection
