$(function () {
    $('#image').change(function () {
        let reader = new FileReader();
        reader.addEventListener('load', function (e) {
            $('#img_change').html('<img src="" alt="">');
            $('#img_change img').attr('src', e.target.result);
        });

        reader.readAsDataURL($('#image').prop('files')[0]);
    });

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
    
    $(document).on('click', '.addPortfolio', function () {
        let portfoliosRow = $('.freelancer-portfolios');
        let portfoliosCount = portfoliosRow.find('.portfolio').length;

        portfoliosRow.append( getPortfolioTemplate(portfoliosCount) );
    });

    $(document).on('click', '.delPortfolio', function () {
        let portfolio = $( $(this).data('target') );
        let portfolioId = portfolio.data('p_id');
        $('.deleted-portfolios').append('<input type="hidden" name="deleted_portfolios[]" value="' + portfolioId + '">');
        console.log(portfolioId);

        portfolio.remove();
    });
    
    
    function getPortfolioTemplate(iteration = 0) {
        iteration++;
        let template = '<div class="portfolio col-md-3" id="portfolio' + iteration + '" data-p_id="0">';
        template += '<div class="card">';
        template += '<div class="card-header"><span>Портфолио №' + iteration + '</span></div>';
        template += '<div class="card-body">';

        template += '<div class="form-group">';
        template += '<label for="pName' + iteration + '">Наименование</label>';
        template += '<input type="text" class="form-control" id="pName' + iteration + '" name="portfolios[' + (iteration - 1) + '][title]" required>';
        template += '</div>';

        template += '<div class="form-group">';
        template += '<label for="pSlug' + iteration + '">Slug</label>';
        template += '<input type="text" class="form-control" id="pSlug' + iteration + '" name="portfolios[' + (iteration - 1) + '][slug]" required>';
        template += '</div>';

        template += '<div class="form-group">';
        template += '<label for="pUrl' + iteration + '">Ссылка</label>';
        template += '<input type="text" class="form-control" id="pUrl' + iteration + '" name="portfolios[' + (iteration - 1) + '][url]" required>';
        template += '</div>';

        template += '<div class="form-group">';
        template += '<label for="pImg' + iteration + '">Изображение</label>';
        template += '<input type="file" class="form-control showable-img" id="pImg' + iteration + '" name="portfolios[' + (iteration - 1) + '][img]" required>';
        template += '<div class="img_change"></div>';
        template += '</div>';
        template += '</div>';

        template += '<div class="card-footer text-center"><button type="button" class="btn btn-danger delPortfolio" data-target="#portfolio' + iteration + '">Убрать</button></div>';
        template += '</div>';
        template += '</div>';

        return template;
    }
});