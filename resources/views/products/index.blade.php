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
         <h4 style="display:inline-block"> List of Products </h4>
         <a href="{{ route('products.create') }} " class="btn btn-dark btn-sm float-right">Add New Product</a>
      </div>

      <div class="card-body table-responsive">
         @if (count($products) > 0)
            <table class="table table-sm table-hover">
               <thead class="thead-light">
                  <tr>
                     <th scope="col">Name</th>
                     <th scope="col">Trademark</th>
                     <th scope="col">Due Date</th>
                     <th scope="col">Unit Price</th>
                     <th scope="col">Provider</th>
                     <th scope="col">Action</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($products as $product)
                     <tr>
                        <td> {{ $product->name }} </td>
                        <td> {{ $product->trademark }} </td>
                        <td> {{ $product->due_date }} </td>
                        <td> $ {{ $product->unit_price }} </td>
                        <td> {{ $product->provider->name }} </td>
                        <td>
                           <a href="{{ route('products.edit', $product) }} " class="btn btn-info btn-sm">Edit</a>
                        </td>
                     </tr>
                  @endforeach
               </tbody>
            </table>

            <!-- Pagination -->
            <div class="d-flex justify-content-center pagination-sm">
               {!! $products->links() !!}
            </div>

         @else
            <h5> No products to display yet. </h5>
         @endif
      </div>
   </div>
</div>
@endsection
