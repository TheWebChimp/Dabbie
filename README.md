# Dabbie
Simple Database Connector

## Instalation

Require `webchimp/dabbie` with Composer.

## Usage

Dabbie helps you to connect to your database and gives you a handler to use PDO. As it is now, Dabbie is just a simple wrapper.

Connect the following way:

```php
	$dabbie = new Dabbie([
		'host' => '127.0.0.1',
		'user' => 'root',
		'name' => 'database',
		'pass' => 'password123'
	]);
```

And then run queries the following way:

```php
	$sql = "SELECT COUNT(*) AS total FROM `user`;";
	$row = $dabbie->query($sql)->fetch(PDO::FETCH_COLUMN);
```