<div class="form-group">
    <label for="title">T&iacute;tulo</label>
    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ old('title', $story->title)}}">
    @error('title')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
    @enderror
</div>
<div class="form-group">
    <label for="body">Descripci&oacute;n</label>
    <textarea name="body" id="body" class="form-control @error('body') is-invalid @enderror">{{ old('body', $story->body)}}</textarea>
    @error('body')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
    @enderror
</div>
<div class="form-group">
    <label for="type">Tipo</label>
    <select name="type" id="type" class="form-control @error('type') is-invalid @enderror">
        <option value="">Selecciona...</option>
        <option value="short" {{'short' == old('type', $story->type) ? 'selected' : ''}}>Corta</option>
        <option value="long" {{'long' == old('type', $story->type) ? 'selected' : ''}}>Larga</option>
    </select>
    @error('type')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
    @enderror
</div>
<div class="form-group">
    <legend class="col-form-label">Estatus</legend>
    <div class="form-check @error('status') is-invalid @enderror">
        <input class="form-check-input" name="status" type="radio" value="1" id="status1" {{'1' == old('status', $story->status) ? 'checked' : ''}}>
        <label for="status1" class="form-check-label">S&iacute;</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" name="status" type="radio" value="0" id="status2" {{'0' == old('status', $story->status) ? 'checked' : ''}}>
        <label for="status2" class="form-check-label">No</label>
    </div>
    @error('status')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
    @enderror
</div>
