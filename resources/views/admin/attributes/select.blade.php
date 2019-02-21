<label for="group">Group</label>
<select class="form-control" id="group" name="group_id">
    @forelse($groups as $group)
        <option value="{{ $group->id }}">{{ $group->name }}</option>
    @empty

    @endforelse
</select>


