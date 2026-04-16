<form action="createfeedback.php" method="post" class="request-form element__animation" enctype="multipart/form-data">
    <div class="form-inputs">
		<input type="text" name="name" placeholder="Ваше имя" aria-label="Ваше имя" required="">
		<textarea type="text" maxlength="200" class="form-control input-description" placeholder="Ваши пожелания *" id="contentInput" name="description"><?=(isset($news['description']) ? $news['description'] : "")?></textarea>
		<input type="tel" name="phone" placeholder="+7 (___) ___-__-__" data-phone-pattern = "+7 (___) ___-__-__" inputmode="text">
	</div>
	<input type="submit" class="submit-button" value="Отправить">
</form>