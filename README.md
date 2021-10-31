# phpp

cli tool print class information

## Phar Build

```bash
composer build
```

phpp.phar will generate.

## Execute

```bash
php phpp.phar test/fixtures/no-namespace/product/Product.php
```

output:

```
{"name":"Product","package":"","properties":[{"name":"name","type":"Name","private":true},{"name":"price","type":"Price","private":true}]}
```

## development

### Open shell

```bash
docker-compose build
docker-compose run --rm php_cli bash
```

### install dependencies

```bash
composer update
```

### execute tests

```bash
composer test test/
```

