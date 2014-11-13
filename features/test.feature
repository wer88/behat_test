# language: ru

Функционал: Пользователь пользуется поиском

	@javascript 
	Сценарий: Поиск по web страницам
		Допустим я на главной странице
		Тогда я кликаю по ссылке "Регистрация"
		Тогда я должен видеть "Регистрация нового пользователя"
		И я ввожу "Петрович" в поле "REGISTER[NAME]"
		И я ввожу "Петров" в поле "REGISTER[LAST_NAME]"
		И я ввожу "test" в поле "REGISTER[LOGIN]"
		И я ввожу "PaSS" в поле "REGISTER[PASSWORD]"
		И я ввожу "PaSS" в поле "REGISTER[CONFIRM_PASSWORD]"
		И я ввожу "ya@mail.ru" в поле "REGISTER[EMAIL]"
		И я ввожу "test" в поле "captcha_word"
		Тогда я кликаю на "//div[contains(@class, 'b-custom-check')]"
		Тогда я нажимаю "register_submit_button"
		Тогда я должен видеть "Неверно введено слово с картинки"
		
		
