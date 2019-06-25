# jwt4adobe
Gerador de JWT em PHP para adobe i/o

Instalação
----------

Usamos `composer` para baixar as dependências.

Baixe aqui: https://getcomposer.org/

Após baixar o código e instalar o composer. No terminal rode o comando abaixo:

```bash
composer install
```

Exemplo de como usar
--------------------
```php
<?php
//Arquivo: tests/generate_jwt.php

include('vendor/autoload.php');
include('src/Jwt4Adobe.php');

$obj = new Jwt4Adobe();
echo $obj->getJwtToken();
```

---

Qualquer dúvida, entre em contato no e-mail:
**fila@noxworks.com.br**
 
