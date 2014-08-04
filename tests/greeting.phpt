<?php

use Tester\Assert;

# Na�teme knihovny Testeru.
require __DIR__ . '/../vendor/autoload.php';          # p�i instalaci Composerem
//require __DIR__ . '/../tester/Tester/bootstrap.php';  # p�i ru�n� instalaci

# Na�teme testovanou t��du. V praxi se o to z�ejm� postar� Composer anebo v� autoloader.
require __DIR__ . '/../src/Greeting.php';


# Konfigurace prost�ed� velmi zp�ehledn� v�pisy chyb.
# Nemus�te pou��t, pokud preferujete v�choz� v�pis PHP.
Tester\Environment::setup();


$o = new Greeting;

Assert::same( 'Hello John', $o->say('John') );  # O�ek�v�me shodu

Assert::exception(function() use ($o) {         # O�ek�v�me vyj�mku
    $o->say('');
}, 'InvalidArgumentException', 'Invalid name');