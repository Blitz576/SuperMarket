<div class="form-body">
    <div class="row">
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label for="name">Full name</label>
                <div class="controls">
                    <input name="name" type="name" id="name"
                        placeholder="enter name"
                        value="{{ old('name', $user->name) }}"
                        class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label for="email">Email</label>
                <div class="controls">
                    <input name="email" type="email" id="email"
                        placeholder="enter email"
                        value="{{ old('email', $user->email) }}"
                        class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label for="mobile_number">Mobile Number</label>
                <div class="controls">
                    <input name="mobile_number" type="tel" id="mobile_number"
                        placeholder="Enter mobile number"
                        value="{{ old('mobile_number', $user->mobile_number) }}"
                        class="form-control @error('mobile_number') is-invalid @enderror">
                    @error('mobile_number')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <div class="col-md-6 col-12">
            <div class="form-group">
                <label for="first-name-column">Status</label>
                <fieldset id="status" class="form-group">
                    <select name="status" class="form-control @error('status') is-invalid @enderror">
                        <option value="available" @if ($user->status == 'available' or old('status') == 'available') selected @endif>
                            available
                        </option>
                        <option value="unavailable" @if ($user->status == 'unavailable' or old('status') == 'unavailable') selected @endif>
                            unavailable
                        </option>
                    </select>
                </fieldset>
            </div>
            @error('status')
                <p class="invalid-feedback">{{ $message }}
                </p>
            @enderror
        </div>
    </div>

    @if(Route::currentRouteName() === 'users.create')
        <div class="row">
            <div class="col-md-6 col-12">
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="controls">
                        <input name="password" type="password" id="password"
                               placeholder="Enter Password"
                               class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
    
            <div class="col-md-6 col-12">
                <div class="form-group">
                    <label for="password_confirmation">Password Confirmation</label>
                    <div class="controls">
                        <input name="password_confirmation" type="password" id="password_confirmation"
                               placeholder="EnterPassword Confirmation"
                               class="form-control @error('password_confirmation') is-invalid @enderror">
                        @error('password_confirmation')
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-6 col-md-12">
            <fieldset class="form-group">
                <label for="image">Upload Image</label>
                <div class="custom-file mb-1">
                    <input type="file" name="image" id="image"
                           class="custom-file-input @error('image') is-invalid @enderror" id="inputGroupFile01"
                           onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])">
                    <label class="custom-file-label"
                           for="inputGroupFile01">Upload Image</label>
                    @error('image')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <img id="image" src="{{ url('storage/' . $user->image) }}"
                     style="height: 80px; width: 100px;" alt="no user image uploaded">
            </fieldset>
        </div>
    </div>
    

    <div class="row">
        <div class="col-12">
            <button type="submit" class="btn btn-primary mr-1 mb-1 rounded">Save</button>
        </div>
    </div>
</div>