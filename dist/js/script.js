$('document').ready(function () {
    // for any file upload :)
    $("input[type=file]").change(function () {
        id = $(this).attr('id');
        if (id == undefined) {
            alert('Please Define Id For Your Input File Validate');
            return 0;
        }
        return validateUploadedFunction($(this).attr('id'));
    });

    $('form').submit(function (e) {

        validetedFile = validateUploadedFunction($('input[type=file]').attr('id'));
        if (!validetedFile) {
            e.preventDefault();
            alert('Please Fix All Errors');
            return;
        }
    });
});


function validateUploadedFunction(id) {
    var fileExtension = ['jpeg', 'jpg', 'png', 'gif'];
    var uploadedFile = $('#' + id).val();
    var splitedName = uploadedFile.split(".");
    var extension = splitedName[splitedName.length - 1];

    if (extension == undefined) {
        alert("Please select an image");
        return 0;
    }

    if ($.inArray(extension, fileExtension)) {
        $('#' + id).addClass('is-invalid');
        $(".fileError").removeClass('d-none');
        return 0;
    } else {
        $('#' + id).removeClass('is-invalid');
        $(".fileError").addClass('d-none');
        return 1;
    }
}