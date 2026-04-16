<form action="createorder.php" method="post" class="request-form element__animation" enctype="multipart/form-data">
	<div class="hidden-data">
        <input type="hidden" name="serviceid" class="serviceField" value="<?=$service['id']?>">
    </div>
    <div class="form-inputs">
		<input type="text" class="check" name="namecustomer" placeholder="Ваше имя" aria-label="Ваше имя" required="">
		<input type="tel" class="check" name="phone" placeholder="+7 (___) ___-__-__" data-phone-pattern = "+7 (___) ___-__-__" inputmode="text">
	</div>
	<input type="submit" class="submit-button" value="Заказать">
</form>