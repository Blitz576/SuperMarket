<div class="form-body">
    <div class="row">
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label for="name">Name</label>
                <div class="controls">
                    <input name="name" type="name" id="name"
                        placeholder="enter name"
                        value="{{ old('name', $category->name) }}"
                        class="form-control @error('name') is-invalid @enderror">
                    @error('name')
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
                        <option value="available" @if ($category->status == 'available' or old('status') == 'available') selected @endif>
                            available
                        </option>
                        <option value="unavailable" @if ($category->status == 'unavailable' or old('status') == 'unavailable') selected @endif>
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

    <div class="row">
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label for="description">Description</label>
                <div class="controls">
            <textarea name="description" id="description"
                      placeholder="Enter description"
                      class="form-control @error('description') is-invalid @enderror">{{ old('description', $category->description) }}</textarea>
                    @error('description')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-12">
            <fieldset class="form-group">
                <label for="inputGroupFile01">Upload Image</label>
                <div class="custom-file mb-1">
                    <input type="file" name="cover_image"
                           class="custom-file-input @error('cover_image') is-invalid @enderror" id="inputGroupFile01"
                           onchange="document.getElementById('cover_image').src = window.URL.createObjectURL(this.files[0])">
                    <label class="custom-file-label"
                           for="inputGroupFile01">Upload Image</label>
                    @error('cover_image')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <img id="cover_image" src="{{ url('storage/' . $category->cover_image) }}"
                     style="height: 80px; width: 100px;" alt="no image uploaded">
            </fieldset>
        </div>

    </div>
    

    <div class="row">
        <div class="col-12">
            <button type="submit" class="btn btn-primary mr-1 mb-1 rounded">Save</button>
        </div>
    </div>
</div>