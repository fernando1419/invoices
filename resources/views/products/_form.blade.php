<div class="form-group">
   <label for="name">Name</label>
   <input class="form-control form-control-sm @error('name') is-invalid @enderror"
         type="text"
         name="name"
         placeholder="Name"
         value="{{ old('name', $product->name ?? '') }}">
   @error('name')
      <p class="text-danger"> {{ $errors->first('name') }} </p>
   @enderror
</div>

<div class="form-group">
   <label for="trademark">TradeMark</label>
   <input class="form-control form-control-sm @error('trademark') is-invalid @enderror"
         type="text"
         name="trademark"
         placeholder="Trademark"
         value="{{ old('trademark', $product->trademark ?? '') }}">
   @error('trademark')
      <p class="text-danger"> {{ $errors->first('trademark') }} </p>
   @enderror
</div>

<div class="form-group">
   <label for="due_date">Due Date</label>
   <input class="form-control form-control-sm @error('due_date') is-invalid @enderror"
   type="date"
   name="due_date"
   value="{{ old('due_date', $product->due_date ?? '' ) }}"
   >
   @error('due_date')
   <p class="text-danger">{{ $errors->first('due_date') }} </p>
   @enderror
</div>

<div class="form-group">
   <label for="unit_price">Unit Price</label>
   <input class="form-control form-control-sm @error('unit_price') is-invalid @enderror"
         type="number"
         name="unit_price"
         placeholder="Unit Price"
         value="{{ old('unit_price', $product->unit_price ?? '') }}">
   @error('unit_price')
      <p class="text-danger"> {{ $errors->first('unit_price') }} </p>
   @enderror
</div>

<div class="form-group">
   <label for="stock">Stock (units)</label>
   <input class="form-control form-control-sm @error('stock') is-invalid @enderror"
         type="number"
         name="stock"
         placeholder="Stock available"
         value="{{ old('stock', $product->stock ?? '') }}">
   @error('stock')
      <p class="text-danger"> {{ $errors->first('stock') }} </p>
   @enderror
</div>

<div class="form-group">
    <label for="provider_id">Provider</label>
    <select name="provider_id" class="form-control form-control-sm">
        <option value=""> Select a provider... </option>
        @foreach($providers as $id => $name)
            <option value="{{ $id }}" {{ old('provider_id', $product->provider_id ?? "") == $id ? 'selected' : "" }} >
                {{ $name }}
            </option>
        @endforeach
    </select>
    @error('provider_id')
        <p class="text-danger">{{ $errors->first('provider_id') }} </p>
    @enderror
</div>

<button type="submit" class="btn btn-primary btn-sm float-right"> {{ $submitButtonText }} </button>
