$(function () {

    function getPricingPlanTemplate(iteration = 0) {
        iteration++;
        let template = '<div class="col-md-4 pr-plan-container" id="plan_' + iteration + '">';
        template += '<div class="pr-plan p-4">';

        template += '<div class="form-group">';
        template += '<label for="planTitle">Название</label>';
        template += '<input type="text" id="planTitle" class="form-control" name="plans[' + (iteration - 1) + '][title]" required>';
        template += '</div>';

        template += '<div class="form-group">';
        template += '<label for="planPrice">Цена</label>';
        template += '<input type="number" id="planPrice" class="form-control" name="plans[' + (iteration - 1) + '][price]" required>';
        template += '</div>';

        template += '<div class="form-group">';
        template += '<label for="planTop">Время в топе (дней)</label>';
        template += '<input type="number" id="planTop" class="form-control" name="plans[' + (iteration - 1) + '][on_top]" required>';
        template += '</div>';

        // template += '<div class="form-group">';
        // template += '<label for="planLimit">Лимит объявлений</label>';
        // template += '<input type="number" id="planLimit" class="form-control" name="plans[' + (iteration - 1) + '][limit]">';
        // template += '</div>';

        template += '<div class="form-group">';
        template += '<label for="planSortOrder">Порядок</label>';
        template += '<input type="number" id="planSortOrder" class="form-control" name="plans[' + (iteration - 1) + '][sort_order]">';
        template += '</div>';

        template += '<div class="form-group">';
        template += '<div class="card">';
        template += '<div class="card-header">';
        template += '<span>Преимущества</span>';
        template += '</div>';
        template += '<div class="card-body">';
        template += '<div class="plan-advantages" id="adv_' + iteration + '">';
        template += getPlanAdvantageTemplate( (iteration - 1) );
        template += '</div>';
        template += '</div>';
        template += '<div class="card-footer">';
        template += '<button class="add-advantage btn btn-success btn-sm" type="button" data-target="#adv_' + iteration + '" data-index="' + (iteration - 1) + '"><i class="fas fa-plus"></i></button>';
        template += '</div>';
        template += '</div>';
        template += '</div>';

        template += '<div class="plan-del-btn d-flex justify-content-center">';
        template += '<button type="button" class="rm-plan btn btn-sm btn-danger" data-target="#plan_' + iteration + '" data-plan_id="0">удалить</button>';
        template += '</div>';
        template += '</div>';
        template += '</div>';

        return template;

    }

    function getPlanAdvantageTemplate(index) {
        let template = '<div class="plan-advantage d-flex">';
        template += '<input type="text" name="plans[' + index + '][advantages][]" class="form-control mr-2">';
        template += '<button type="button" class="rm-advantage btn-sm btn btn-danger"><i class="fas fa-minus"></i></button>';
        template += '</div>';

        return template;
    }

    $(document).on('click', '.add-plan', function () {
        let plansRow = $('.pr-plans .form-row');
        let plansCount = $('.pr-plans .form-row .pr-plan-container').length;
        plansRow.append( getPricingPlanTemplate(plansCount) );
    });

    $(document).on('click', '.rm-plan', function () {
        let plan = $($(this).data('target'));
        let planId = $(this).data('plan_id');

        $('.deleted-plans').append('<input type="hidden" name="deleted_plans[]" value="' + planId + '">');
        plan.remove();
    });
    
    $(document).on('click', '.rm-advantage', function () {
        $(this).parent('.plan-advantage').remove();
    });

    $(document).on('click', '.add-advantage', function () {
        let advantages = $($(this).data('target'));
        let index = $(this).data('index');
        advantages.append( getPlanAdvantageTemplate(index) );
    })

});