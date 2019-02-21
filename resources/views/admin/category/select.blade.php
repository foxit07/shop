<label for="parent">Parent</label>
<select class="form-control" id="parent" name="parent_id">
    <option></option>
    @forelse($categories as $category)
        <option value="{{ $category->id }}">{{ $category->path }}</option>
    @empty

    @endforelse
</select>


