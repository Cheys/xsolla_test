$(document).ready(function(e){
	var hidden = $('.hiden');
	var popup = $('.popup_form');
	var forma = $('#zakaz_forma');
	function toggling(){
		$('.shadow').hide();
		hidden.toggle();
		popup.toggle();
	}
	$('.button_popup').click(function(){
		toggling();
		forma.find('input').val();
	});
	hidden.click(function(){
		toggling();
	});
	var errors = [];
	forma.submit(function(e){
		e.preventDefault();
		forma.find('input').each(function(index){
		  if ($(this).val()==''){
			errors.push(index);
			$(this).css('border-color','red');
		  }
		});
		if (errors.length>0){
			console.log(errors);
			alert('Заполните правильно поля');
			errors = [];
		}else{
			var jata = forma.serialize();
			$.ajax({
				url: 'lib/handler.php',
				type: 'post',
				data: jata,
				success: function(data) {
					if(data=='ok'){
						alert("Успешно оплачено!");
						toggling();
						}else{
						alert('Заполните правильно поля '+data);
					}
				},
				error: function(xhr, ajaxOptions, thrownError) {
					alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
				}
			});
		}
	});
/*  Обновлятор шараги этой всей */
		$('.upd').click(function(){
			var data = $(this).parent('tr').find('input').serialize();
			var pid = $(this).parent('tr').data('id');
			$.ajax({
				url: 'lib/handler.php',
				type: 'post',
				data:data + '&pid=' + pid,
				success: function(data) {
					if(data=='ok'){
						alert("Успеx");
						}else{
						alert('не успех');
					}
				},
				error: function(xhr, ajaxOptions, thrownError) {
					alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
				}
			});
	});
/*  конец обновлятора шараги */
	forma.find('input').focus(function(){
		if($(this).val()=='')
		  $(this).css('border-color','gainsboro');
	});
	var win = $('.popup_form');
	win.css({
        'margin-top':'-' + (win.height() / 2) + 'px'
	});
	$("#data").inputmask("m/y");
});