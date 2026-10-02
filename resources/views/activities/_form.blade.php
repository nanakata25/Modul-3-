<div class="form-field">
    <label for="code">Kode kegiatan <span aria-hidden="true">*</span></label>
    <input id="code" name="code" type="text" maxlength="30" required value="{{ old('code', $activity->code) }}">
</div>
<div class="form-field">
    <label for="title">Judul <span aria-hidden="true">*</span></label>
    <input id="title" name="title" type="text" minlength="5" maxlength="100" required value="{{ old('title', $activity->title) }}" aria-describedby="title-help">
    <small id="title-help">5–100 karakter.</small>
</div>
<div class="form-field">
    <label for="description">Deskripsi</label>
    <textarea id="description" name="description" rows="5" maxlength="2000">{{ old('description', $activity->description) }}</textarea>
</div>
<div class="form-grid">
    <div class="form-field"><label for="category_id">Kategori <span aria-hidden="true">*</span></label><select id="category_id" name="category_id" required><option value="">Pilih kategori</option>@foreach ($categories as $category)<option value="{{ $category->id }}" @selected((string) old('category_id', $activity->category_id) === (string) $category->id)>{{ $category->name }}</option>@endforeach</select></div>
    <div class="form-field"><label for="activity_date">Tanggal <span aria-hidden="true">*</span></label><input id="activity_date" name="activity_date" type="date" required value="{{ old('activity_date', $activity->activity_date?->format('Y-m-d')) }}"></div>
    <div class="form-field"><label for="status">Status <span aria-hidden="true">*</span></label><select id="status" name="status" required>@foreach ($statuses as $option)<option value="{{ $option }}" @selected(old('status', $activity->status ?? 'Draft') === $option)>{{ $option }}</option>@endforeach</select></div>
</div>
<div class="form-actions"><button class="button" type="submit">{{ $submitLabel }}</button><a class="button button-light" href="{{ $activity->exists ? route('activities.show', $activity) : route('activities.index') }}">Batal</a></div>
