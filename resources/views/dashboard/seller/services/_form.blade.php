<input type="hidden" name="id" value="{{ old('id') ?? $service->id }}"
    class="form-control w-25 @error('position') is-invalid @enderror">

<div class="form-group">
    <label>Title</label>
    <input type="text" name="title" value="{{ old('title') ?? $service->title }}" class="form-control" required autofocus autocomplete="off">
	<div class="invalid-feedback">Please fill in your title</div>
</div>

<div class="form-group">
    <label>Description</label>
    <textarea class="form-control" required="">{{ old('description') ?? $service->description }}</textarea>
	<div class="invalid-feedback">Please fill in your description</div>
</div>

<div class="form-group">
    <label>Thumbnail</label>
    <div class="custom-file">
        <input type="file" class="custom-file-input" id="customFile" accept="image/png, image/jpeg" required>
        <label class="custom-file-label" for="customFile">Choose file</label>
		<div class="invalid-feedback">Please fill in your thumbnail</div>
    </div>
</div>

<div class="form-group">
    <label>Category</label>
    <select class="form-control selectric">
        <option>Option 1</option>
        <option>Option 2</option>
        <option>Option 3</option>
        <option>Option 4</option>
        <option>Option 5</option>
        <option>Option 6</option>
    </select>
</div>

<div class="form-group">
    <label>File Format</label>
    <input type="text" placeholder="PSD, AI, Dll" name="fileFormat" value="{{ old('fileFormat') ?? $service->fileFormat }}" class="form-control" required autofocus autocomplete="off">
	<div class="invalid-feedback">Please fill in your file format</div>
</div>

<button type="submit" class="btn btn-primary">
	Save
</button>
