# worst-password

```PHP
use Sunnanbei\WorstPassword\Worst;
```

```PHP
$worst = new Worst();
$response = $worst->check('123456');
var_dump($response);    //false
$response = $worst->check('a!1234340@');
var_dump($response);    //a!1234340@
```


```PHP
$paths = [
    '/www/worst_passwords.php'
];
$worst = new Worst($paths);
$response = $worst->check('123456');
var_dump($response);    //false
$response = $worst->check('a!1234340@');
var_dump($response);    //a!1234340@
```
