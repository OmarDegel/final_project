<script>
    Dropzone.autoDiscover = false;

    let previewTemplate = `
    <div class="dz-preview dz-file-preview">
        <div class="dz-photo">
            <img class="dz-thumbnail" data-dz-thumbnail 
                 style="width:150px; height:150px; object-fit:cover;" />
        </div>
        <button class="dz-delete border-0 p-0" type="button" data-dz-remove>
            &times;
        </button>
    </div>`;


    let myDropzone = new Dropzone("#myDropzoneArea", {
        url: "/", // مش مهم، مش هيرفع الملف لوحده
        paramName: "image",
        autoProcessQueue: false, // يمنع الرفع التلقائي
        uploadMultiple: false,
        maxFiles: 1,
        maxFilesize: 20, 
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        previewTemplate: previewTemplate,
        addRemoveLinks: true,
        dictDefaultMessage: "Drop files here or click to upload",
        init: function() {
            const dz = this;

            @if (!empty($existingImageUrl))
                const mockFile = {
                    name: "Current Image",
                    size: 123456,
                    type: "image/jpeg"
                };
                dz.emit("addedfile", mockFile);
                dz.emit("thumbnail", mockFile, "{{ $existingImageUrl }}");
                dz.emit("complete", mockFile);
                dz.files.push(mockFile);
            @endif

            // عند إضافة ملف
            this.on("addedfile", function(file) {
                if (this.files.length > 1) {
                    this.removeFile(this.files[0]);
                }

                let fileInput = document.getElementById('hiddenImageInput');
                let dataTransfer = new DataTransfer();
                dataTransfer.items.add(file);
                fileInput.files = dataTransfer.files;
            });

            // عند إزالة الملف
            this.on("removedfile", function() {
                document.getElementById('hiddenImageInput').value = "";
            });

            this.on("maxfilesexceeded", function(file) {
                this.removeAllFiles();
                this.addFile(file);
            });
        }
    });

    // submit الفورم بدون رفع منفصل
    $('#formSubmit').on('click', function(event) {
        event.preventDefault();
        var $this = $(this);

        // اظهار spinner
        $this.children('.spinner-border').removeClass('d-none');

        if ($('#formDropzone')[0].checkValidity() === false) {
            event.stopPropagation();
            $('#formDropzone').addClass('was-validated');
            $this.children('.spinner-border').addClass('d-none');
        } else {
            // مباشرة ارسال الفورم
            document.getElementById('formDropzone').submit();
        }
    });
</script>