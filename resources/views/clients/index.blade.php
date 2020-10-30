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
         <h4 style="display:inline-block"> List of Clients </h4>
         <a href="{{ route('clients.create') }} " class="btn btn-dark btn-sm float-right">Add New Client</a>
      </div>

      <div class="card-body table-responsive">
         @if (count($clients) > 0)
            <table class="table table-sm table-hover">
               {{-- <caption>List of clients</caption> --}}
               <thead class="thead-light">
                  <tr>
                     <th scope="col">First Name</th>
                     <th scope="col">Last Name</th>
                     <th scope="col">DNI</th>
                     <th scope="col">Birth Date</th>
                     {{-- <th scope="col">Credit Card Number</th> --}}
                     <th scope="col">Action</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($clients as $client)
                     <tr>
                        <td> {{ $client->first_name }} </td>
                        <td> {{ $client->last_name }} </td>
                        <td> {{ $client->dni }} </td>
                        <td> {{ $client->birth_date }} </td>
                        <td>
                           <a href="{{ route('clients.edit', $client) }} " class="btn btn-info btn-sm">Edit</a>
                        </td>
                     </tr>
                  @endforeach
               </tbody>
            </table>

            <!-- Pagination -->
            <div class="d-flex justify-content-center pagination-sm">
               {!! $clients->links() !!}
            </div>

         @else
            <h5> No Clients to display yet. </h5>
         @endif
      </div>
   </div>
</div>
@endsection
