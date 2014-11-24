# language: ru

Функционал: Страница О программе

	@javascript 
	Сценарий: Пользователь просматривает страницу О программе
        Допустим я на главной странице
        И я перехожу на "about/"
        Тогда я должен видеть элемент "ul.b-menu__list"
        И я должен видеть элемент "div.b-parts"
        И я должен видеть "О программе" внутри элемента "h1"
        И я должен видеть "Общие условия" внутри элемента "ul.left-m > li > a"
        И я должен видеть элемент "ul.left-m > li > a:contains('Плановый график реализации программы')"
        И я должен видеть элемент "ul.left-m > li > a:contains('Нормативно-правовая база')"
        И я должен видеть элемент "ul.left-m > li > a:contains('Как приобрести жильё на условиях программы')"  
        Тогда я кликаю по ссылке "Нормативно-правовая база"
        И я должен видеть "Нормативно-правовая база" внутри элемента "h1"
        И я должен видеть элемент "div.list-year"
        Тогда я кликаю по ссылке "Плановый график реализации программы"
		И я раскрываю случайный элемент списка "//div[@class='b-subject']/ul/li/span"
     

		
		    