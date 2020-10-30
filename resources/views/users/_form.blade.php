<div class="row">
   <div class="col-6">
      <div class="form-group">
         <label for="first_name">First Name</label>
         <input class="form-control form-control-sm @error('first_name') is-invalid @enderror"
               type="text"
               name="first_name"
               placeholder="First Name"
               value="{{ old('first_name', $user->first_name ?? '') }}">
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
               value="{{ old('last_name', $user->last_name ?? '') }}">
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
               value="{{ old('dni', $user->dni ?? '') }}">
         @error('dni')
            <p class="text-danger"> {{ $errors->first('dni') }} </p>
         @enderror
      </div>

      <div class="form-group">
         <label for="file">File/file</label>
         <input class="form-control form-control-sm @error('file') is-invalid @enderror"
               type="text"
               name="file"
               placeholder="ID / file"
               value="{{ old('file', $user->file ?? '') }}">
         @error('file')
            <p class="text-danger"> {{ $errors->first('file') }} </p>
         @enderror
      </div>
   </div>

   <div class="col-6">
      <div class="form-group">
         <label for="birth_date">Birth Date</label>
         <input class="form-control form-control-sm @error('birth_date') is-invalid @enderror"
               type="date"
               name="birth_date"
               value="{{ old('birth_date', $user->birth_date ?? '' ) }}"
         >
         @error('birth_date')
            <p class="text-danger">{{ $errors->first('birth_date') }} </p>
         @enderror
      </div>

      <div class="form-group">
         <label for="email">Email</label>
         <input class="form-control form-control-sm @error('email') is-invalid @enderror"
               type="email"
               name="email"
               placeholder="Email"
               value="{{ old('email', $user->email ?? '') }}">
         @error('email')
            <p class="text-danger"> {{ $errors->first('email') }} </p>
         @enderror
      </div>

      <div class="form-group">
         <label for="password">Password</label>
         <input class="form-control form-control-sm @error('password') is-invalid @enderror"
               type="password"
               name="password"
               placeholder="Enter your password"
         >
         @error('password')
            <p class="text-danger"> {{ $errors->first('password') }} </p>
         @enderror
      </div>

      <div class="form-group">
         <label for="password_confirmation">Password Confirmation</label>
         <input class="form-control form-control-sm @error('password_confirmation') is-invalid @enderror"
               type="password"
               name="password_confirmation"
               placeholder="Re-enter your password"
         >
         @error('password_confirmation')
            <p class="text-danger"> {{ $errors->first('password_confirmation') }} </p>
         @enderror
      </div>
   </div>
</div>

<button type="submit" class="btn btn-primary btn-sm float-right"> {{ $submitButtonText }} </button>
