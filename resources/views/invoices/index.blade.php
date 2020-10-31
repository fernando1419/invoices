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
         <h4 style="display:inline-block"> List of Invoices </h4>
         <a href="{{ route('invoices.create') }} " class="btn btn-dark btn-sm float-right">Add New Invoice</a>
      </div>

      <div class="card-body table-responsive">
         @if (count($invoices) > 0)
            <table class="table table-sm table-hover">
               <thead class="thead-light">
                  <tr>
                     <th scope="col">Number</th>
                     <th scope="col">Created DateTime</th>
                     <th scope="col">Total</th>
                     <th scope="col">Payment Method</th>
                     <th scope="col">Client</th>
                     <th scope="col">Action</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($invoices as $invoice)
                     <tr>
                        <td> {{ $invoice->number }} </td>
                        <td> {{ $invoice->date->diffForHumans() }} </td>
                        <td> $ {{ $invoice->total }} </td>
                        <td> {{ $invoice->payment_method }} </td>
                        <td> {{ $invoice->client->full_name }} </td>
                        <td>
                           <a href="{{ route('invoices.show', $invoice) }} " class="btn btn-success btn-sm">Show</a>
                        </td>
                     </tr>
                  @endforeach
               </tbody>
            </table>

            <!-- Pagination -->
            <div class="d-flex justify-content-center pagination-sm">
               {!! $invoices->links() !!}
            </div>

         @else
            <h5> No invoices to display yet. </h5>
         @endif
      </div>
   </div>
</div>
@endsection
