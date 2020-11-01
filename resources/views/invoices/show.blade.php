@extends('layouts.app')

@section('content')

<div class="container">

   @include('invoices._body')

   <br/>
   <a href="{{ route('invoices.index') }}" class="btn btn-dark btn-sm float-left">Back to List of Invoices...</a>
   <a href="{{ route('invoices.createPDF', $invoice) }}" class="btn btn-danger btn-sm float-right">Print Invoice</a>

</div>

@endsection
