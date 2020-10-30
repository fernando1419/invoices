@extends('layouts.app')

@section('content')

   <div class="container">

      <div class="card">

         <div class="card-header">
            <h5>Create a Product</h5>
         </div>

         <div class="card-body">
            <form action="{{ route('products.store') }}" method="POST">
               @csrf

               @include('products._form', ['submitButtonText' => 'Add Product'])

               <a href="{{ route('products.index') }}" class="btn btn-dark btn-sm">Back to List of products...</a>
            </form>
         </div>

      </div>

   </div>

@endsection
