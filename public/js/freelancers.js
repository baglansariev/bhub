$(document).ready(function() {
	var maxInputNum = 1;

	$('.add-more-portfolios-btn').click(function(){

		var $inputPortfolioTitle = $('<div class="col-md-6"><div class="form-group"><input type="text" name="portfolio[' + maxInputNum + '][title]" class="form-control" placeholder="Наименование портфолио"></div></div>'),
		$inputPortfolioUrl = $('<div class="col-md-6"><div class="form-group"><input type="text" name="portfolio[' + maxInputNum + '][url]" class="form-control" placeholder="Ссылка"></div></div>'),
		$inputPortfolioImg = $('<div class="col-md-12"><div class="form-group"><label for="photo" style="color: #252525" class="common-title">Изображение портфолио</label><input type="file" name="portfolio[' + maxInputNum + '][img]" class="form-control" placeholder="Изображение"></div></div>');

		$('.form-row').append($inputPortfolioTitle);
		$('.form-row').append($inputPortfolioUrl);
		$('.form-row').append($inputPortfolioImg);
		maxInputNum++;

		// var index = 0;
		// $('.addmore-portfolio').click(function () {
		// 	index++;
		// 	var inputs = $('.form-row-wrapper').html();

		// 	$.ajax({
		// 		type:'get',
		// 		url:"/ajaxPortfolio",
		// 		data:{index:index},
		// 		success:function(data){
		// 			$(".form-row-wrapper").after(data);
		// 		}
		// 	});       
		// });
	});
});