# PHP CertCentral
PHP client for the DigiCert cert-central API.

# Usage
```php
<?php
require_once 'vendor/autoload.php';

use Wahyuief\PhpCertcentral\Client;
use Wahyuief\PhpCertcentral\Product;

// Config X-DC-DEVKEY
new Client('YOUR_X_DC_DEVKEY');

// Print JSON Output
echo Product::get();
```
