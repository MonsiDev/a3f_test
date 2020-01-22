<?
    require __DIR__ . '/parser.php';

    $parser = Parser::loadPage('https://yandex.ru/');
    print_r($parser->getTagArray());