<input type="hidden" name="id" value="{{ old('id') ?? $feature->id }}"
    class="form-control w-25 @error('position') is-invalid @enderror">

<div class="form-group">
    <label class="col-form-label">
		Features Description
	</label>
    <div class="col-12s">
        <textarea name="title" class="summernote">{{$feature->title}}</textarea>
    </div>
</div>

<div class="form-group">
    <label>Features Plan</label>
    <select name="ServicePlanId" class="form-control selectric">
        <option value="_svp8sydhfk3">Basic</option>
    </select>
</div>

<button type="submit" class="btn btn-primary">
    Save
</button>
