## Installing the project

To install the project, follow these steps:

Clone project: `git clone https://github.com/fleustek/q-app.git`

Change directory: `cd q-app`

To use the project, follow these steps:

### Local

```
composer install
```

```
cp .env.example .env
```

```
php artisan key:generate
```

```
php artisan serve
```

### CLI Commands

Add author:

```
php artisan authors:add <email> <password> -F <first name> -L <last name> -B <birthdate> -O <biography> -G <gender> -P <place of birth>
```

Example: `php artisan authors:add email@email.com password -F Ernest -L Hemingway -B 21-7-1989 -O bio -G male -P "oak park"`
