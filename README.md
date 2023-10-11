# SparkMVC

¡Hi!, I have created a framework based on MVC architecture and it includes the following key features:

## Features:

- **Code Organization**: The code is structured into models, views, and controllers, making it easy to separate application logic from presentation code. This organization improves code maintainability and readability.

- **Advanced Router**: The framework includes an advanced router that supports pretty URLs and route variables using regular expressions.

- **Namespaces**: Classes are organized into namespaces and loaded automatically on demand. This eliminates the need to explicitly require classes and is facilitated by Composer, a utility for PHP dependency management.

- **Controllers**: Controllers are responsible for determining the response to be sent to the user. The framework includes action filters, which allow you to execute code before each action in a controller, making it useful for tasks like authentication.

- **Views**: Views contain presentation code, and the framework also integrates the Blade template engine, making it easier to create dynamic and attractive views.

- **Models**: Models are used to handle data in your application. The framework efficiently connects to the database only when necessary, ensuring optimal performance.

- **Configuration and Error Handling**: The framework supports different configurations and error handling strategies for various environments. You can easily switch between development and production settings.


## Credits

This project benefited from the use of the following technologies and tools:

- [Blade Template Engine](https://github.com/jenssegers/blade): Special thanks to Laravel for providing an elegant and efficient template system.

- [Composer](https://getcomposer.org/): Composer has simplified dependency management in PHP and made it easier to incorporate third-party components.

## Getting Started

Below, I provide instructions for getting started with using and developing on this framework. We hope you find it useful and productive!

## Run Locally

Clone the project

```bash
  git clone https://github.com/MoisesCorcho/SparkMVC.git
```

Go to the project directory

```bash
  cd sparkMVC
```

Install dependencies

```bash
  composer install
```

updates the automatic class loader information so that the project's core classes are also loaded with the composer loader.

```bash
  composer dump-autoload
```

## Config .htaccess
You have to modify the .htaccess file into public folder

	<IfModule mod_rewrite.c>
	  RewriteEngine On
	  RewriteBase "PROJECT_PATH"
	  RewriteCond %{REQUEST_FILENAME} !-d
	  RewriteCond %{REQUEST_FILENAME} !-f
	  RewriteRule  ^(.*)$ index.php?$1 [L,QSA]
	</IfModule>

In `"PROJECT_PATH"` you have to put your project path including public folder at the end (without "" characters). E.g. if you are working with XAMPP the path will start at `htdocs` folder. 
Example `"/projects/SparkMVC/public"`

## Routing

You can find the routes in routes/routes.php

### RULES TO NAMING CONTROLLERS AND METHODS IN THE ROUTES

#### CONTROLLERS

- Controller names follow the StudlyCase standard. For example, `PostsController`. Therefore, you should name them in StudlyCase.
- You must name controllers in the route using hyphens. For instance, `posts-controller` should correspond to `PostsController`.

#### METHODS

- Method names follow the camelCase standard. For example, `addNew`. You should name them in camelCase.
- You must name methods in the route using hyphens. For example, `add-new` should correspond to `addNew`.

### WRITE DINAMIC ROUTES

To define dynamic routes you must place them inside braces `{}`.
To set parameters you must use the following convention
`{parameter_name:parameter_type}`

### OPTIONS TO DEFINE THE PARAMETERS

| Pattern   | Description                                      |
|-----------|--------------------------------------------------|
| `\d+`     | Match with ONE or more digits from 0 to 9        |
| `\w+`     | Match with ONE or more characters (a - z, A - Z, 0 - 9) |
| `[\w-]+`  | Match with ONE or more characters (a - z, A - Z, 0 - 9) and hyphen ('-') |


RouterFacade provides a static interface to use the following methods.
to add routes you must use the `add` method and always use the `dispatch` method at the end to execute the routes.

route examples

        Router::add('{controller}/{method}');
        Router::add('{controller}/{method}/{id:\d+}');
        Router::add('admin/{controller}/{method}', ['namespace' => 'Admin']);
As you saw in the examples, you can send as the second parameter of the `add` function an associative array where you can specify the `namespace` if you want to organize your controllers in folders, you can specify the `controller` and the `method` if you want.

## Controllers 

Controllers are located in `App/Controllers`. All the controllers extends the base controller located in `Core`.
Using the base controller you have access to action filters, these allow you execute code before and after an action inside the controller, to use this you to add an `Action` sufix to the methods name and you have to overwrite the `before` and `after` methods.

Using the base controller, you have access to action filters. These filters allow you to execute code before and after an action inside the controller. To use this, you need to add an `Action` suffix to the method's name, and you have to overwrite both the `before` and `after` methods.

Note: Returning false in the `before` method means that the method you want to call and the `after` method will not be called.

e.g.

| normal method  | method with action filter  |
| :------------ | :------------ |
|  index() |  indexAction() |

## Models
Models are located in `App/Models` and you should call constructor method to initialize Database Controller

	<?php
	
	namespace App\Models;
	use Core\Database;

	class Post {

    private $db;

		public function __construct()
		{
			$this->db = new Database();
		}
	}

Through the Database class you will have access to methods to work with the database more easily, like:

| Function                 | Parameters                                                    | Description                                | Parameter Types  | Return Type      |
|--------------------------|--------------------------------------------------------------|--------------------------------------------|------------------|-------------------|
| `query`                  | `$sql` (string)                                               | Prepares an SQL query for execution.        | string           | void              |
| `bind`                   | `$param` (string), `$value` (mixed), `$type` (int, optional)  | Binds values to a prepared query.          | string, mixed, int | void              |
| `execute`                | None                                                         | Executes the prepared query.               | None             | bool (success)   |
| `resultSet`              | None                                                         | Retrieves the result set as an array of objects. | None             | array of objects |
| `single`                 | None                                                         | Retrieves a single record as an object.    | None             | object            |
| `rowCount`               | None                                                         | Gets the number of rows affected by the last query. | None             | int               |

## Views

To use Views you have to import them with `use Core\View`. Views are located by default in `resources/views`.

Through `Core\View` you'll have access to `renderBlade()` method, which will receive as parameters the view path and the params as an associative array.

If you do not want to use the blade engine,  you can use the `render` method, which will work just with php. These views are located in `App/Views`.

## Config Variables

Configuration variables are located in `App/Config/config.php`. Here you will configure Database variables, project name, url root, show errors, timezone and more.

## 🚀 About Me
I am a backend developer with 5 years of experience, with a background in both academic and professional environments. My focus on PHP, Laravel, and databases has been strengthened through real-world and personal projects. My passion for learning and logical problem-solving combines with empathy and active listening skills, enhancing collaboration in challenging work situations.

## 🔗 Links
[![portfolio](https://img.shields.io/badge/my_portfolio-000?style=for-the-badge&logo=ko-fi&logoColor=white)](#)

[![linkedin](https://img.shields.io/badge/linkedin-0A66C2?style=for-the-badge&logo=linkedin&logoColor=white)](https://www.linkedin.com/in/moises-corcho-perez-ingenierodesistemas)

