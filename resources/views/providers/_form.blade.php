<div class="form-group">
   <label for="name">Name</label>
   <input class="form-control form-control-sm @error('name') is-invalid @enderror"
         type="text"
         name="name"
         placeholder="Enter name"
         value="{{ old('name', $provider->name ?? '') }}">
   @error('name')
      <p class="text-danger"> {{ $errors->first('name') }} </p>
   @enderror
</div>

<div class="form-group">
   <label for="address">Address</label>
   <input class="form-control form-control-sm @error('address') is-invalid @enderror"
         type="text"
         name="address"
         placeholder="Enter address"
         value="{{ old('address', $provider->address ?? '') }}">
   @error('address')
      <p class="text-danger"> {{ $errors->first('address') }} </p>
   @enderror
</div>

<button type="submit" class="btn btn-primary btn-sm float-right"> {{ $submitButtonText }} </button>
