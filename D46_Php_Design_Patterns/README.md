# D46 - Design Pattern

Dans ces exercices, nous appliquerons les principes SOLID vus en cours pour se démarquer du modèle "Database Driven Developpement" et s'orienter vers la logique "Code first" et la "Clean Architecture".

Nous améliorerons notre code au fur et à mesure des exercices, en implémantant des Design Pattern pour aider à résoudre des problèmes plus complexes, sans complexifier le code, sa sécurité et sa maintenance.

*Tips* : Pour exécuter le programme, vous pouvez utiliser Docker pour travailler sur la dernière version de Php sans avoir à l'installer directement dans votre environnement :
```sh
docker run --rm -v "$(pwd)/D46_Php_Design_Patterns":/app -w /app php:8.4-cli-alpine php src/Application/main.php
```

*Ressources utiles* :
 - Explication et schéma des design patterns usuels : https://refactoring.guru/design-patterns

## Créer un modèle de classes

Notre client souhaite pouvoir visualiser une liste de produits et de fournisseurs, chaque produit pouvant être acheté à des fournisseurs différents à des prix différents.
Nous devons également pouvoir générer des commandes de certains produits à un fournisseur précis.
Chaque réception de commande devra alimenter le stock.
Le donneur d'ordre des opérations doit pouvoir être identifié, de même que son bénéficiaire.
Les produits peuvent également être de plusieurs types, marchandise et service dans un premier temps.

Créez une structure de classes pour matérialiser ce modèle. Pensez à découper ce modèle en différents modules afin de visualiser les dépendances fonctionnelles dans votre code (il ne doit pas être possible de faire des cercles de dépendances : A dépend de B qui dépend de C qui dépend de A).

Vous livrerez une instanciation complète de chacune des classes du modèle dans le fichier `main.php`.

## Factory & Builder

Nous allons maintenant afficher dans le terminal la liste des Produits du fichier `data/products.json`.

Utilisez les notions vues en cours pour :
 - Charger la liste des produits en json
 - Créer de manière transparente des objets Marchandise ou Service à partir de ces données
 - Les renvoyer sous forme d'un générateur

Nous allons maintenant implémenter des filtres dans la lecture des produits dans le fichier json via un builder.

Implémentez ce pattern via la fonction "filter" telle que présentée dans l'exemple ci-dessous :
```php
// main.php

// Tips : dirname, __FILE__, is_file, file_get_contents

function main(string $datasourceFile)
{
    $datasourcePath = // ....

    $builder = new JsonFileProductBuilder(
        new /* ........([   => ....::class ])*/
    );

    $productCollection = $builder->createFrom($datasourcePath)
        ->filter(fn(array $productData) => $productData['....'] > '?')
        ->getCollection()
    ;

    foreach ($productCollection as $product) {
        var_dump($product);
    }
}

main(...$argv);
```

Vous prendrez grand soin à respecter les principes SOLID et à tester vos cas d'erreur en utilisant des exceptions.

## Adapter




## Prototype

Le pattern Prototype permet de créer des objets à partir d'une définition dynamique (les attributs peuvent être variables sans avoir à créer de nouvelles classes).

Dans notre exemple, nous avons deux grands types de produits : les marchandises et les services, qui possèdent chacun des attributs différents. Nous souhaitons malgré tout avoir une classe de produits commune pour tous les achats. Afin de ne pas avoir en permanence des attributs null à tester, il faut utiliser un Prototype.
