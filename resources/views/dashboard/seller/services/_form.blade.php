<input type="hidden" name="id" value="{{ old('id') ?? $service->id }}" class="form-control w-25 @error('position') is-invalid @enderror">
<div class="form-group">
    <label>Title</label>
    <input type="text" name="title" class="form-control">
</div>

<div class="form-group">
    <label>Description</label>
    <textarea class="form-control" required=""></textarea>
</div>


<div class="form-group">
    <label>Password Strength</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <div class="input-group-text">
                <i class="fas fa-lock"></i>
            </div>
        </div>
        <input type="password" class="form-control pwstrength" data-indicator="pwindicator">
    </div>
    <div id="pwindicator" class="pwindicator">
        <div class="bar"></div>
        <div class="label"></div>
    </div>
</div>
<div class="form-group">
    <label>Currency</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <div class="input-group-text">
                $
            </div>
        </div>
        <input type="text" class="form-control currency">
    </div>
</div>
<div class="form-group">
    <label>Purchase Code</label>
    <input type="text" class="form-control purchase-code" placeholder="ASDF-GHIJ-KLMN-OPQR">
</div>
<div class="form-group">
    <label>Invoice</label>
    <input type="text" class="form-control invoice-input">
</div>
<div class="form-group">
    <label>Date</label>
    <input type="text" class="form-control datemask" placeholder="YYYY/MM/DD">
</div>
<div class="form-group">
    <label>Credit Card</label>
    <input type="text" class="form-control creditcard">
</div>
<div class="form-group">
    <label>Tags</label>
    <input type="text" class="form-control inputtags">
</div>