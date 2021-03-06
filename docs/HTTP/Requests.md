HTTP Requests
=====

Phouch supports flexible HTTP Requests. This section will describe some of the internal workings of Phouch, specifically how the internal HTTP library sends requests to Couch behind the curtain of Phouch Model Objects.

## HTTP Service Providers

Phouch is developed in such a way that it is not coupled tightly to any one technology at any layer of service. This rings true for HTTP especially, the foremost underlying technology of HTTP for Phouch is Curl. Curl works well for most situations and environments, but that is not to say that another technology will not emerge and be more efficient in the future. This also allows environments where Curl is not available a viable alternative of an HTTP Service.

The service provider can be set in Phouch's autoloader / configuration file, ```phouch.php```.

```php
define('DEFAULT_HTTP_SERVICE_PROVIDER', 'Curl');
```

Setting this will cause any Phouch\HTTP\Request to use the Curl HttpService if another instance of HttpService was not injected into the Request prior to calling Request::execute.

### Injecting Service Providers

Service providers can as easily be injected manually into a Request object during runtime. This will overwrite the default HttpService if supplied.

```php
$request = new Phouch\HTTP\Request();
$service = new Phouch\HTTP\Service\Curl();

$service->setOptions(new Phouch\HTTP\Options\Get());
$request->setHttpService($service);

$response = $request->execute();
```
This is useful if you need to use a different service provider than your default at any point in the application. Options can be given to either the Request or the HttpService provider, by default, they should be passed through the Request object.

## POST Requests

Post requests can be handled in a few different ways for flexibility in design.

```php
$options = new Phouch\HTTP\Options\POST();
$options->setURI('/songs')
    ->setPostData(array(
       'id' => 'alone_in_kyoto',
       'title' => 'Alone in Kyoto'
       'artist' => 'Air',
       'album' => 'Talkie Walkie'
));

$request = new Phouch\HTTP\Request($options);
$response = $request->execute();
```

## GET Requests

```php
$options = new Phouch\HTTP\Options\GET();
$options->setURI('/songs/alone_in_kyoto');

$request = new Phouch\HTTP\Request($options);
$response = $request->execute();
```

## DELETE Requests

```php
$options = new Phouch\HTTP\Options\DELETE();
$options->setURI('/songs/alone_in_kyoto');

$request = new Phouch\HTTP\Request($options);
$response = $request->execute();
```
