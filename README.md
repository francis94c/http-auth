![License MIT](https://img.shields.io/github/license/francis94c/http-auth.svg) ![Splint](https://img.shields.io/badge/splint--ci-francis94c%2Fhttp--auth-orange.svg) ![Latest Release](https://img.shields.io/github/release/francis94c/http-auth.svg) ![Commits](https://img.shields.io/github/last-commit/francis94c/http-auth.svg)

# http-auth
A Code Igniter Library for HTTP Authentication.

## Installation ##
To install, download and install Splint from <https://splint.cynobit.com/downloads/splint> and then run the below from your Code Igniter project root.

```bash
splint install francis94c/http-auth
```
## Loading ##
From anywhere you can access the ```CI``` instance

```php
$params = array(
  "auth" => array (
    "username" => "hashed_password"
  ),
  "bearer" => "Bearer Name",
  "denied_message" => "Access Denied!"
);
$this->load->splint("francis94c/http-auth", "+HTTPAuth", $params, "http_auth");
```
OR Alternatively load with the below steps.

* create a file ```http_auth_config.php``` in your ```application/config``` folder.
* Add the below contents into the file created above.

```php
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config["http_auth_config"] = array(
  "auth" => array (
    "username" => "hashed_password"
  ),
  "bearer" => "Bearer Name",
  "denied_message" => "Access Denied!"
)
?>
```
* Then load with the single line of code.

```php
$this->load->package("francis94c/http-auth");
```
## Usage ##
After loading, simply place the below line of code where you want authentication.
```php
$this->http_auth->authenticate();
```
__The above is most preferable at a Controller's Constructor.__

This will output your ```$denied_message``` if authentication fails or allow the rest of the Controller to run if successful.
