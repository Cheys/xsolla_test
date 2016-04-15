<?php
	ini_set('error_reporting', E_ALL);
	ini_set('display_errors', 1);
	define('START',microtime());
	include __DIR__.'/lib/config.php';
	//include __DIR__.'/lib/handler.php';

	$orders = $mysqli->query("select * from orders");
	if($orders){
		while ($row = $orders->fetch_array()){
		  $ord[] = $row;
		}
	}
    $orders->free();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Тест</title>
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.0/jquery.inputmask.bundle.js"></script>
		<link rel="shortcut icon" href="images/favicon.ico" />
		<link rel="stylesheet" href="css/mycss.css" type="text/css" />
		<script src="js/form.js"></script>
	</head>
	<body>
		<div class="t-btn button_popup">Клик сюда для формы</div>
		<div class="hiden"></div>
		<div class="popup_form col-xs-10 col-sm-4 col-lg-3 col-md-3">
			<form id="zakaz_forma" method="POST">
				<h2>Payment</h2>
				<div class="ordinary">Данные заказа:</div>
				<label for="id">Номер заказа</label>
				<input name="id" id="id" placeholder="1234567890" pattern="\d{1,16}" required />
				<div class="col-xs-6">
					<label for="price">Стоимость</label>
				<input name="price" id="price" min="0" placeholder="1234" step="0.01" pattern="\d{1,16}"  required type="number"></div>
				<div class="col-xs-6">
					<label for="currency">Валюта</label>
					<select name="currency"  required id="currency" type="number">
						<option value="RUB" checked="checked">RUB</option>
						<option value="USD">USD</option>
					</select>
				</div>
				<div class="ordinary">Данные карты:</div>
				<label for="fio">Владелец</label>
				<input name="fio" id="fio"  required placeholder="vladelec karty" pattern="[A-Za-z\s]{1,25}" type="text">
				<div class="col-xs-6">
					<label for="data">Ex.date</label>
					<input name="data" id="data"  required placeholder="02/2012" />
				</div>
				<div class="col-xs-6">
					<label for="cvv">CVV</label>
					<input name="cvv" id="cvv"  required placeholder="123" maxlength="3" pattern="[0-9]{3}" />
				</div>
				<div style="clear:both"></div>
				<input type="hidden" name="create" value="create" />
				<button type="submit" class="zakaz_j">Рассчитать</button>
			</form>
		</div>
		<div class="col-xs-6"><table class="table ">
			<thead>
				<tr>
					<th>id</th>
					<th>заказ id</th>
					<th>прайс</th>
				<th>куренси</th><th>владелец</th><th>дата месяц</th><th>дата год</th><th>cvv</th><th>когда</th>
				<th>Update</th>
				</tr>
			</thead>
			<tbody>
			<? foreach ($ord as $bl) {?>
				<tr data-id="<?=$bl['id']?>">
					<td><?=$bl['id']?></td>
					<td><input name="id" value="<?=$bl['order_id']?>" /></td>
					<td><input name="price" value="<?=$bl['price']?>" /></td>
					<td><input name="currency" value="<?=$bl[3]?>" /></td>
					<td><input name="fio" value="<?=$bl[4]?>" /></td>
					<td><input name="month" value="<?=$bl[5]?>" /></td>
					<td><input name="year" value="<?=$bl[6]?>" /></td>
					<td><input name="cvv" value="<?=$bl[7]?>" /></td>
					<td><input name="when" value="<?=$bl[8]?>" /></td>
					<td class="upd">Тык для апдейта</td>
				</tr>
				<?}?>
			</tbody>
		</table>
		</div>
	</body>