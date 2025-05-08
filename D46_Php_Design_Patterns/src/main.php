<?php
require 'Lib/Autoloader.php';
new Autoloader();

function main(string $datasourceFile = '../data/products.json')
{
    $datasourcePath = dirname(__FILE__) . '/' . $datasourceFile;
    
    if (!is_file($datasourcePath)) {
        throw new Exception("Le fichier $datasourcePath n'existe pas");
    }

    $visitor = new fileTranscriptorVisitor();
    $visitor->addStrategy(new jsonFileTranscriptor());
    $visitor->addStrategy(new csvFileTranscriptor());

    $builder = new FileProductBuilder($visitor);

    $productCollection = $builder
                        ->createFrom($datasourcePath)
                        ->filter(fn(array $data) => $data['type'] === 'service')
                        ->getCollection();

    foreach ($productCollection as $product) {
        echo $product->showProduct() . "\n";
    }
}

main();
