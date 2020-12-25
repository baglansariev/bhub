$(function () {

    $(document).on('change', '.showable-img', function () {
        console.log('test');
        let reader = new FileReader();
        let image = $(this);
        reader.addEventListener('load', function (e) {
            let temp = image.siblings('.img_change').html('<img src="" alt="">');
            console.log(temp.find('img'));
            temp.find('img').attr('src', e.target.result);
        });

        reader.readAsDataURL(image.prop('files')[0]);
    });

    $('.addPortfolioRow').click(function () {
        let portfolioRowsCount = $('.user-portfolios .form-row').length;
        console.log(portfolioRowsCount);
        $('.user-portfolios').append( getPortfoloRowTemplate(portfolioRowsCount) );
    });

    $(document).on('click', '.portfolioDel', function(){
        let portfolioRow = $($(this).data('target'));
        let portfolioId = $(this).data('p_id');
        $('.deleted_portfolios').append('<input type="hidden" name="deleted_portfolios[]" value="' + portfolioId + '">');

        portfolioRow.remove();
    });

    function getPortfoloRowTemplate(iteration) {
        iteration++;

        let formRow = '<div class="form-row" id="portfolioRow' + iteration + '">';

        formRow += '<div class="col-sm-12">';
        formRow += '<div class="form-group">';
        formRow += '<label for="inputTitle' + iteration + '">Заголовок</label>';
        formRow += '<input type="text" name="portfolios[' + (iteration - 1) + '][title]" class="form-control" id="inputTitle' + iteration + '" required>';
        formRow += '</div>';
        formRow += '</div>';

        formRow += '<div class="col-sm-12">';
        formRow += '<div class="form-group">';
        formRow += '<label for="inputUrl' + iteration + '">Ссылка</label>';
        formRow += '<input type="text" name="portfolios[' + (iteration - 1) + '][url]" class="form-control" id="inputUrl' + iteration + '">';
        formRow += '</div>';
        formRow += '</div>';

        formRow += '<div class="col-sm-12">';
        formRow += '<div class="form-group">';
        formRow += '<label for="inputImg' + iteration + '">Изображение</label>';
        formRow += '<input type="file" name="portfolios[' + (iteration - 1) + '][img]" class="form-control showable-img" id="inputImg' + iteration + '">';
        formRow += '<div class="img_change"></div>';
        formRow += '</div>';
        formRow += '</div>';
        formRow += '<input type="hidden" name="portfolios[' + (iteration - 1) + '][p_id]" value="0">';

        formRow += '<div class="portfolio-del col-sm-12 d-flex justify-content-center pb-3 mb-3">';
        formRow += '<button type="button" class="btn btn-danger portfolioDel" data-target="#portfolioRow' + iteration + '" data-p_id="0">Убрать</button>';
        formRow += '</div>';

        formRow += '</div>';

        return formRow;
    }

});