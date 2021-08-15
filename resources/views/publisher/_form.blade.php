@if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="form-group">
            <label for="">PublisherName</label>
            <input type="text" class="form-control @error('name')is-invalid @enderror" name="name">
            @error('name')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="">BookId</label>
            <select name='book_id'>
                @foreach ($books as $book)
                    <option value="{{ $book->id }}">
                        {{ $book->book_name }}
                    </option>
                @endforeach
            </select>

        </div>
        <div class="form-group">
            <label for="">YearOfPublisher</label>
            <input type="text" class="form-control @error('year')is-invalid @enderror" name="year">
            @error('year')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>


        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>