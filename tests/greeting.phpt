<?php

use Tester\Assert;

# Naèteme knihovny Testeru.
require __DIR__ . '/../vendor/autoload.php';          # pøi instalaci Composerem
//require __DIR__ . '/../tester/Tester/bootstrap.php';  # pøi ruèní instalaci

# Naèteme testovanou tøídu. V praxi se o to zøejmì postará Composer anebo váš autoloader.
require __DIR__ . '/../src/Greeting.php';


# Konfigurace prostøedí velmi zpøehlední výpisy chyb.
# Nemusíte použít, pokud preferujete výchozí výpis PHP.
Tester\Environment::setup();


$o = new Greeting;

Assert::same( 'Hello John', $o->say('John') );  # Oèekáváme shodu

Assert::exception(function() use ($o) {         # Oèekáváme vyjímku
    $o->say('');
}, 'InvalidArgumentException', 'Invalid name');