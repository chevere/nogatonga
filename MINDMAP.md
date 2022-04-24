# Mindmap

Nogatonga is an Static Site Generator using [Danky](https://chevere.org/packages/danky) templates.

## How it works?

In Nogatonga you define routes, which binds data to template views. Nogatonga evaluates all these route-views bindings and generates an static website of HTML documents (or any other markup). You can feed data to Nogatonga by any means as it is a general purpose static website generator. It provides a compressive API that enables both stand-alone and component usage.

## Why Nogatonga?

The goal of Nogatonga is to offer an static website generator for Danky templates, thus the **Danky Nogatonga** combo enables to easily create testable static websites.

## Getting Started

Once installed, run the following command. It will create a base `./project` to work with.

```sh
vendor/bin/nogatonga new
```

Optionally, customize the command flags:

```sh
vendor/bin/nogatonga new --name project_name --path ./somewhere
```

Once done, the project directory will contain base files and the `nogatonga.php` config file.

Now, run this:

```sh
vendor/bin/nogatonga preview --watch
```

If everything goes well you will get a message with an URL address to live-preview your project changes.

## Project structure

### Nogatonga config

Nogatonga config is at the root of the project folder, under `./nogatonga.php`.

### Data

Data for route binding is stored at `./data` folder. These files return data as a set of key-value pairs. This data will be available at template-view layer.

You can use `./data/base.php` to provide common data that will be available for all route bindings.

### Template

The template views and snippets are at the `./template` folder.

### Biding

Route/view bindings are defined at the `./binding.php` file. You can define route bindings using the `bind` function, also redirects using the `bindRedirect` function.

```php
use function Chevere\Nogatonga\bind;
use function Chevere\Nogatonga\bindRedirect;
use function Chevere\Nogatonga\binding;

return binding(
    home: bind(
        path: '/',
    ),
    about: bind(
        path: '/about',
    ),
    tos: bindRedirect(
        '/tos',
        '/about'
    ),
);
```

Pages will **bind data** from `./data/bind/<route_name>.php` and **its view** at `./template/views/<route_name>.php`. Custom view can be provided by passing `view:`.

```php
route(
    path: '/',
    view: 'home-alt',
)
```

For the code above a route is defined with its view at `./template/views/home-alt.php` and the data at `/home-2.php`.
