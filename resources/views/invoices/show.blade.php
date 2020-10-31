@extends('layouts.app')

@section('content')

<div class="container">

   <div class="card">

      {{-- {{ $invoice }} --}}

      <div class="card-header">
         <strong> Invoice Nº: {{ $invoice->number }} </strong>
         <span class="float-right text-success">
            <strong> Total: $ {{ $invoice->total }} </strong>
         </span>
      </div>

      <div class="card-body">
         <div class="row">
            <div class="col-6">
               <p class="card-text"> <strong> Date: </strong> {{ $invoice->date }} <small>({{$invoice->date->diffForHumans()}})</small></p>
               <p class="card-text">
                  <strong> Employee: </strong> {{ $invoice->user->full_name }}
                  <strong> - (File Nº: </strong> {{ $invoice->user->file }})
               </p>
            </div>
            <div class="col-6">
               <p class="card-text"> <strong> Customer: </strong> {{ $invoice->client->full_name }} <strong> - (DNI: </strong> {{ $invoice->client->dni }})</p>
               <p class="card-text"> <strong> Payment: </strong> {{ $invoice->payment_method }} </p>
            </div>
         </div>
      </div>

      <div class="card-body table-responsive">
         @if (count($invoice->products) > 0)
            <table class="table table-sm table-hover">
               <thead class="thead-light">
                  <tr>
                     <th scope="col">Product ID</th>
                     <th scope="col">Product Name</th>
                     <th scope="col">Price</th>
                     <th scope="col">Quantity</th>
                     <th scope="col">SubTotal</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($invoice->products as $item )
                     <tr>
                        <td> {{ $item->pivot->product_id }} </td>
                        <td> {{ $item->name }} </td>
                        <td> $ {{ $item->pivot->price }} </td>
                        <td> {{ $item->pivot->quantity }} </td>
                        <td> $ {{ $item->pivot->quantity * $item->pivot->price }} </td>
                     </tr>
                  @endforeach
               </tbody>
               <small>Amount of products: {{ $productsQuantity }} </small>
            </table>
         @else
            <span class="text-danger"> <small> There are no detail items for this invoice. </small> </span>
         @endif
      </div>

   </div>

   <br/>
   <a href="{{ route('invoices.index') }}" class="btn btn-dark btn-sm float-left">Back to List of Invoices...</a>
   <a href="{{ route('invoices.index') }}" class="btn btn-danger btn-sm float-right">Print Invoice</a>

</div>

@endsection
