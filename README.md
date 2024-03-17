# DataStore PHP API Client

Thin PHP wrapper over DataStore API

## Installation

```sh
composer require datastore/datastore-php
```

Requirements:

- PHP 5.6+
- Guzzle 6/7

## Usage

Create API client instance:

```php
> $token = "Replace with Datastore API key";
> $datastore = new \Datastore\DatastoreClient($token);
```

Then call API methods as specified below

## Email

### [Suggestions email](https://datastore.market/docs/api/suggestions/email)

```php
> $response = $datastore->suggestions("email", "alisa@");
> var_dump($response);
```

### [Handbooks disposable email](https://datastore.market/docs/api/handbooks/emails)

```php
> $response = $datastore->handbooks("email", "gegec13810@hdrlog.com");
> var_dump($response);
```

## Full name

### [Suggestions name](https://datastore.market/docs/api/suggestions/fullName)

```php
> $response = $datastore->suggestions("fullName", "ива");
> var_dump($response);
```

## Profile API

### [Account balance](https://datastore.market/docs/api/account/balance)

```php
> $response = $datastore->getBalance();
> var_dump($response);
```

### [Account stats](https://datastore.market/docs/api/account/stats)

```php
> $response = $datastore->getStats();
> var_dump($response);
```

### [Account versions](https://datastore.market/docs/api/account/versions)

```php
> $response = $datastore->getVersions();
> var_dump($response);
```

## [Changelog](CHANGELOG.md)

This library uses [Semver](https://semver.org/) with MAJOR.MINOR.PATCH schema. See changelog for details.

## License

[MIT](https://choosealicense.com/licenses/mit/)
