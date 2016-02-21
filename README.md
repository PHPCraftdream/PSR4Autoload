# PSR4Autoload PHPCraftdream
\PHPCraftdream\PSR4Autoload\PSR4Autoload - PSR4 autoload class

## Installation

Add the following to your composer.json and run `composer update`

```json
{
	"require":
	{
		"phpcraftdream/psr4utoload": "dev-master"
	}
}
```

## Usage

```php

	require_once './vendor/autoload.php';

	$psr4utoload = new \PHPCraftdream\PSR4Autoload\PSR4Autoload();

	$psr4utoload->register();

	$psr4utoload->setPaths(
		[
			'NameSpace1' => '/dir1/',
			'NameSpace2' => '/dir2/',
			'NameSpace3' => '/dir3/',
		]
	);

	$obj = new \NameSpace1\className();
```