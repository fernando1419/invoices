@extends('layouts.app')

@section('content')

   <div class="container">

      <div class="card">

         <div class="card-header">
            <h5>Edit a Product</h5>
         </div>

         <div class="card-body">
            <form action="{{ route('products.update', $product) }}" method="POST">
               @csrf
               @method('PUT')

               @include('products._form', ['submitButtonText' => 'Update Product'])

               <a href="{{ route('products.index') }}" class="btn btn-dark btn-sm float-left">Back to List of products...</a>
            </form>
         </div>

      </div>

   </div>

@endsection
