<div class="form-group">
   <label for="first_name">First Name</label>
   <input class="form-control form-control-sm @error('first_name') is-invalid @enderror"
         type="text"
         name="first_name"
         placeholder="First Name"
         value="{{ old('first_name', $client->first_name ?? '') }}">
   @error('first_name')
      <p class="text-danger"> {{ $errors->first('first_name') }} </p>
   @enderror
</div>

<div class="form-group">
   <label for="last_name">Last Name</label>
   <input class="form-control form-control-sm @error('last_name') is-invalid @enderror"
         type="text"
         name="last_name"
         placeholder="Last Name"
         value="{{ old('last_name', $client->last_name ?? '') }}">
   @error('last_name')
      <p class="text-danger"> {{ $errors->first('last_name') }} </p>
   @enderror
</div>

<div class="form-group">
   <label for="dni">DNI</label>
   <input class="form-control form-control-sm @error('dni') is-invalid @enderror"
         type="text"
         name="dni"
         placeholder="DNI"
         value="{{ old('dni', $client->dni ?? '') }}">
   @error('dni')
      <p class="text-danger"> {{ $errors->first('dni') }} </p>
   @enderror
</div>

<div class="form-group">
   <label for="birth_date">Birth Date</label>
   <input class="form-control form-control-sm @error('birth_date') is-invalid @enderror"
   type="date"
   name="birth_date"
   value="{{ old('birth_date', $client->birth_date ?? '' ) }}"
   >
   @error('birth_date')
   <p class="text-danger">{{ $errors->first('birth_date') }} </p>
   @enderror
</div>

<div class="form-group">
   <label for="credit_card_number">Credit Card Number</label>
   <input class="form-control form-control-sm @error('credit_card_number') is-invalid @enderror"
         type="text"
         name="credit_card_number"
         placeholder="Credit Card Number"
         value="{{ old('credit_card_number', $client->credit_card_number ?? '') }}">
   @error('credit_card_number')
      <p class="text-danger"> {{ $errors->first('credit_card_number') }} </p>
   @enderror
</div>

<button type="submit" class="btn btn-primary btn-sm float-right"> {{ $submitButtonText }} </button>
