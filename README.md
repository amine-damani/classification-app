
# Classification App (Docker + Ngnix + Mysql + Laravel8 + Php Unite + VueJS + OAuth2)


system for users classification users/group as a REST API







## Installation

To deploy this project run:

```bash
  docker-compose build
```

```bash
  docker-compose up -d
```

```bash
docker-compose run --rm composer install
docker-compose run --rm artisan migrate
docker-compose run --rm artisan seed
```

```bash
  docker-compose build
```
Permissions Issues:
```bash
chmod -R gu+w storage
chmod -R guo+w storage
php artisan cache:clear
```

Ports detailed:

- **nginx** - `:8081`
- **mysql** - `:3310`
- **php** - `:9000`
- **nodejs** - `:3000`

## screenshot
User List No Auth:
![A cute kitten](http://placekitten.com/200/300?style=centerme)

Group List:
![A cute kitten](http://placekitten.com/200/300?style=centerme)

User List With Auth:
![A cute kitten](http://placekitten.com/200/300?style=centerme)

Login page:
![A cute kitten](http://placekitten.com/200/300?style=centerme)

Php Unite Test:
![A cute kitten](http://placekitten.com/200/300?style=centerme)

## Demo


