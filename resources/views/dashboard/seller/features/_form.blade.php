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
        <option value="1">Basic</option>
    </select>
</div>

<div class="form-group">
    <label>Price</label>
    <input type="number" name="price" value="{{ old('price') ?? $feature->price }}" class="form-control" required autofocus autocomplete="off">
	<div class="invalid-feedback">Please fill in your price</div>
</div>

<button type="submit" class="btn btn-primary">
    Save
</button>
