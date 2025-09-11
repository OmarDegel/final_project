<div class="form-group mb-4">
    <label class="form-label" for="formImage">{{ __('site.image') }}</label>

    <!-- Dropzone Area -->
    <div class="dropzone needsclick dz-clickable dz-max-files-reached @error($name) is-invalid @enderror"
        id="myDropzoneArea">
        <div class="dz-message needsclick">
            {{ __('site.Drag_file_here_to_upload') }}
        </div>
    </div>

    <!-- Hidden input to store selected file -->
    <input type="file" name="{{ $name }}" id="hiddenImageInput" class="d-none" />

    @error($name)
    <span class="text-danger d-block mt-2">{{ $message }}</span>
    @enderror
</div>