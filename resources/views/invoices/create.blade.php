@extends('layouts.app')

@section('content')

<div class="container">

   <div class="card">

      <div class="card-header">
         <h5>Create an Invoice</h5>
      </div>

      <div class="card-body">

         <form action="{{ route('invoices.store') }}" method="POST">
            @csrf

            <div class="row">

               <!-- Invoice Data -->
               <div class="col-6">

                  <div class="form-group">
                     <label for="number">Invoice Number</label>
                     <input class="form-control form-control-sm @error('number') is-invalid @enderror"
                        type="text" name="number" placeholder="Invoice Number" value="{{ old('number', $invoice->number ?? mt_rand(111111111, 999999999)) }}">
                        @error('number')
                        <p class="text-danger"> {{ $errors->first('number') }} </p>
                        @enderror
                  </div>

                  <div class="row">
                     <div class="col-6">
                        <div class="form-group">
                           <label for="date">Date</label>
                           <input class="form-control form-control-sm @error('date') is-invalid @enderror"
                              id="invoice-date" type="date" name="date" value="{{ old('date', $invoice->date ?? date('Y-m-d') ) }}">
                           @error('date')
                              <p class="text-danger">{{ $errors->first('date') }} </p>
                           @enderror
                        </div>
                     </div>

                     <div class="col-6">
                        <div class="form-group">
                           <label for="payment_method">Payment</label>
                           <select name="payment_method" class="form-control form-control-sm">
                              <option value="cash"> cash </option>
                              <option value="debit-card"> debit-card </option>
                              <option value="credit-card"> credit-card </option>
                              <option value="wire-transfer"> wire-transfer </option>
                              <option value="bank-check"> bank-check </option>
                           </select>
                           @error('payment_method')
                              <p class="text-danger">{{ $errors->first('payment_method') }} </p>
                           @enderror
                        </div>
                     </div>

                  </div>

               </div>

               <!-- Customer Data (component) -->
               <div class="col-6">
                  <div class="form-group">
                     <label for="client_id">Client</label>
                     <select name="client_id" class="form-control form-control-sm">
                        <option value=""> Select a Client... </option>
                        @foreach($clients as $client)
                           <option value="{{ $client->id }}" {{ old('client_id', $invoice->client_id ?? "") == $client->id ? 'selected' : "" }} >
                              {{ $client->getFullNameAttribute() }}
                           </option>
                        @endforeach
                     </select>
                     @error('client_id')
                        <p class="text-danger">{{ $errors->first('client_id') }} </p>
                     @enderror
                  </div>
               </div>

            </div>

            <button type="submit" class="btn btn-primary btn-sm float-right"> Create Invoice </button>

         </form>

      </div>

   </div>

</div>

@endsection

{{-- @section('js')
   <script>
      document.getElementById('invoice-date').valueAsDate = new Date();
   </script>
@endsection --}}
