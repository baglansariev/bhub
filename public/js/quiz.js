$(document).ready(function() {

	$('.quiz-title').click(function(){
		if(!$(this).hasClass('quiz-title-active')){
			$(this).siblings().removeClass('quiz-title-active');
			$(this).addClass('quiz-title-active');
			$(this).find('.quiz-circle').addClass('quiz-circle-active');
			$(this).siblings().find('.quiz-circle').removeClass('quiz-circle-active');

			// var id = $(this).find('.quiz-circle').data('id');
			// var quizUserAnswerCount = $('#quizUserAnswerCount-'+id);
			// if (quizUserAnswerCount) {
			// 	quizUserAnswerCount.html(quizUserAnswerCount.data('user-answer-count')).css('margin-top', '-20px');
			// }
		}
	});


	// Ajax отправим выбранный ответ 
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	// $('.btn-sending-quiz-answer').click(function(e) {
	// 	e.preventDefault();
	// 	var form = $('#form-quiz-user-answer');
	// 	//console.log(form.serialize());
	// 	$.ajax({
	// 		type: 'get',
	// 		action: 'ajaxQuizUserAnswer',
	// 		data: form.serialize(),
	// 		success: function(response) {
	// 			console.log(response);
	// 		},
	// 		error: function() {
	// 			console.log("error");
	// 		}
	// 	});
	// });
});