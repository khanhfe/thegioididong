$(document).ready(function() {
	$('ul.wrap-suggestion').css('display','none')
	$('#search-keyword').keyup(function(event) {
		if($(this).val().length>=2){
			key = $(this).val();
			$.post('search.php', {'key': key}, function(data) {
				$('ul.wrap-suggestion').html(data);
				$('ul.wrap-suggestion').css('display','block');
			});
		}else{
			$('ul.wrap-suggestion').css('display','none')
		}
	});
});
