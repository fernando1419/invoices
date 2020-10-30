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
         <h4 style="display:inline-block"> List of Providers </h4>
         <a href="{{ route('providers.create') }} " class="btn btn-dark btn-sm float-right">Add New Provider</a>
      </div>

      <div class="card-body table-responsive">
         @if (count($providers) > 0)
            <table class="table table-sm table-hover">
               {{-- <caption>List of providers</caption> --}}
               <thead class="thead-light">
                  <tr>
                     <th scope="col">Name</th>
                     <th scope="col">Address</th>
                     <th scope="col">Action</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($providers as $provider)
                     <tr>
                        <td> {{ $provider->name }} </td>
                        <td> {{ $provider->address }} </td>
                        <td>
                           <a href="{{ route('providers.edit', $provider) }} " class="btn btn-info btn-sm">Edit</a>
                        </td>
                     </tr>
                  @endforeach
               </tbody>
            </table>

            <!-- Pagination -->
            <div class="d-flex justify-content-center pagination-sm">
               {!! $providers->links() !!}
            </div>

         @else
            <h5> No providers to display yet. </h5>
         @endif
      </div>
   </div>
</div>
@endsection
