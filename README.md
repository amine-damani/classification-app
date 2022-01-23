
# Classification App (Docker + Ngnix + Mysql + Laravel8 + Php Unite + VueJS + OAuth2)


system for users classification users/group as a REST API


## screenshot
### User List No Auth:
![User List No Auth](http://placekitten.com/200/300?style=centerme)
----
### Group List:
![Group List](http://placekitten.com/200/300?style=centerme)
----
### User List With Auth:
![User List With Auth](http://placekitten.com/200/300?style=centerme)
----
### Login page:
![Login page](http://placekitten.com/200/300?style=centerme)
----
### Php Unite Test:
![Php Unite Test](http://placekitten.com/200/300?style=centerme)
----
## Demo
![Demo 1](http://placekitten.com/200/300?style=centerme)
----
![Demo 1](http://placekitten.com/200/300?style=centerme)
----




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

<<<<<<< HEAD
=======
## screenshot
### User List No Auth:
![User List No Auth](https://raw.githubusercontent.com/amine-damani/classification-app/main/screenshot/users_list_no_auth.png?raw=true)
----
### Group List:
![Group List](https://raw.githubusercontent.com/amine-damani/classification-app/main/screenshot/groups_list.png?raw=true)
----
### User List With Auth:
![User List With Auth](https://raw.githubusercontent.com/amine-damani/classification-app/main/screenshot/users_list_auth.png?raw=true)
----
### Login page:
![Login page](https://raw.githubusercontent.com/amine-damani/classification-app/main/screenshot/login_page.png?raw=true)
----
### Php Unite Test:
![Php Unite Test](https://raw.githubusercontent.com/amine-damani/classification-app/main/screenshot/php_unite_test.png?raw=true)
----
## Demo
![Demo 1](https://raw.githubusercontent.com/amine-damani/classification-app/main/screenshot/demo.gif?raw=true)
----
![Demo 1](https://raw.githubusercontent.com/amine-damani/classification-app/main/screenshot/crud_test.gif?raw=true)
----

>>>>>>> 6911cb7995bbbc4ef817865d9830714e174ac4f3

