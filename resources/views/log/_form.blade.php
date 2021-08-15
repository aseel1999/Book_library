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
            <label for="">IssueId</label>
            <select name='issue_id'>
                @foreach ($issues as $issue)
                    <option value="{{ $issue->id }}">
                        {{ $issue->issue_name }}
                    </option>
                @endforeach
            </select>
            @error('status')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Status</label>
            <input type="text" class="form-control @error('status')is-invalid @enderror" name="status">
            @error('status')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>