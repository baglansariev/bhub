$(function () {
    $('#image').change(function () {
        let reader = new FileReader();
        reader.addEventListener('load', function (e) {
            $('#img_change').html('<img src="" alt="">');
            $('#img_change img').attr('src', e.target.result);
        });

        reader.readAsDataURL($('#image').prop('files')[0]);
    });
});