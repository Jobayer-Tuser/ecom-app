$(document).ready(function() {
    $('.summernote').summernote({
        height: 200
    });

    $('.tagit').tagit({
        fieldName: 'tags',
        availableTags: ['c++', 'java', 'php', 'javascript', 'ruby', 'python', 'c'],
        autocomplete: {
            delay: 0,
            minLength: 2
        }
    });

    $('.add-product-variant').click(function (e) {
        e.preventDefault();

       let productVariantForm = `
            <div class="row mb-3 gx-3">
                <div class="col-4">
                    <x-text-input name="variant_name[]" placeholder="e.g Size" value="{{ old('name') }}" />
                </div>
                <div class="col-6">
                    <ul id="jquery-tagit" name="variant_value[]" class="tagit form-control"></ul>
                </div>
                <div class="col-2 d-inline-flex">
                    <button type="button" class="btn btn-default add-product-variant"><i class="fas fa-plus-circle"></i></button>
                    <button type="button" class="btn btn-default ms-2"><i class="fas fa-minus-circle"></i></button>
                </div>
            </div>`;
    });


    $('#fileupload').fileupload({
        previewMaxHeight: 80,
        previewMaxWidth: 120,
        url: '//jquery-file-upload.appspot.com/',
        disableImageResize: /Android(?!.*Chrome)|Opera/.test(window.navigator.userAgent),
        maxFileSize: 999000,
        acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i
    });
    $('#fileupload').on('fileuploadchange', function (e, data) {
        $('#fileupload .empty-row').hide();
    });
    $('#fileupload').on('fileuploadfail', function(e, data){
        if (data.errorThrown === 'abort') {
            if ($('#fileupload .files tr').not('.empty-row').length == 1) {
                $('#fileupload .empty-row').show();
            }
        }
    });

    if ($.support.cors) {
        $.ajax({
            url: '//jquery-file-upload.appspot.com/',
            type: 'HEAD'
        }).fail(function () {
            var alert = '<div class="alert alert-danger m-b-0 m-t-15">Upload server currently unavailable - ' + new Date() + '</div>';
            $('#fileupload #error-msg').removeClass('d-none').html(alert);
        });
    }
});
