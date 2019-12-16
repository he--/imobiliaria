# imobiliaria

Requeriments

	• Install PHP 7.2.5 or higher and these PHP extensions (which are installed and enabled by default in most PHP 7 installations): Ctype, iconv, JSON, PCRE, Session, SimpleXML, and Tokenizer;
	• Install Composer, which is used to install PHP packages;
	• Install Symfony, which creates in your computer a binary called symfony that provides all the tools you need to develop your application locally.

How to run

1. Clone the repository.

2. Install the composer:

Install ubuntu:
 	php composer-setup.php --install-dir=bin –filename=composer mv composer.phar /usr/local/bin/composer 
	
Install windows: 
	https://getcomposer.org/Composer-Setup.exe 
	
Install Mac:
	curl -sS https://getcomposer.org/installer | php sudo mv composer.phar /usr/local/bin/ 


3. Run the application

 symfony server:start php bin/console server:start 0.0.0.0:8000 
