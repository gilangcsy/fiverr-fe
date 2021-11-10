<input type="hidden" name="id" value="{{ old('id') ?? $service->id }}"
    class="form-control w-25 @error('position') is-invalid @enderror">

<div class="form-group">
    <label>Title</label>
    <input type="text" name="title" value="{{ old('title') ?? $service->title }}" class="form-control" required autofocus autocomplete="off">
	<div class="invalid-feedback">Please fill in your title</div>
</div>

<div class="form-group">
    <label class="col-form-label">
		Description
	</label>
    <textarea name="description" class="summernote">{{ old('description') ?? $service->description }}</textarea>
</div>

<div class="form-group">
	<label>Thumbnail</label>
	<input name="thumbnail" type="file" class="form-control" required>
	<div class="invalid-feedback">Please fill in your thumbnail</div>
</div>

<div class="form-group">
    <label>Category</label>
    <select name="CategoryId" class="form-control selectric">
        <option value="1" {{$service->CategoryId == '1' ? 'selected' : ''}}>Logo Design</option>
        <option value="2"{{$service->CategoryId == '2' ? 'selected' : ''}}>Sketch Vector</option>
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
