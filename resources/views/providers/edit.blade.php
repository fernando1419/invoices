@extends('layouts.app')

@section('content')

   <div class="container">

      <div class="card">

         <div class="card-header">
            <h5>Edit a Provider</h5>
         </div>

         <div class="card-body">
            <form action="{{ route('providers.update', $provider) }}" method="POST">
               @csrf
               @method('PUT')

               @include('providers._form', ['submitButtonText' => 'Update Provider'])

               <a href="{{ route('providers.index') }}" class="btn btn-dark btn-sm float-left">Back to List of providers...</a>
            </form>
         </div>

      </div>

   </div>

@endsection
