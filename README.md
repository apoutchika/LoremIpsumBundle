LoremIpsumBundle
================

Generate paragraphs, sentences and words for your development

## Installation

### Download LoremIpsumBundle using composer

Add LoremIpsumBundle in your composer.json

```js
{
    "require": {
        "apoutchika/loremipsum-bundle": "dev-master"
    }
}
```

### Enable the bundle on your kernel

```php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array (
        //...
        new Apoutchika\LoremIpsumBundle\ApoutchikaLoremIpsumBundle(),
    );
}
```

## Use it on controller :

```php
<?php
$loremIpsum = $this->get('apoutchika.lorem_ipsum');

// $paragraphs1 content is aleatory number of paragraphs
$paragraphs = $loremIpsum->getParagraphs();

// $paragraphs2 content is exactly 2 paragraphs
$paragraphs2 = $loremIpsum->getParagraphs(2);

// $paragraphs3 content 2, 3, 4, 5, 6, 7 or 8 paragraphs
$paragraphs3 = $loremIpsum->getParagraphs(2, 8);


// Or with sentences :
$sentences = $loremIpsum->getSentences(1, 3); // 1, 2 or 3 sentences


// Or with words :
$words = $loremIpsum->getWords (2); // return only two words
```


### Set you'r lorem ipsum value

```php
<?php

// for the customers database :

$liName = $this->get('apoutchika.lorem_ipsum');
$liName->setLoremIpsum ('Dupont Dupond Martin Durand Tessier'); // ....

$liFirstName = $this->get('apoutchika.lorem_ipsum');
$liFirstName->setLoremIpsum ('Marie Jean Michel Pierre Philippe'); //...

$user = new User;
$user->setName ($liName->getWords(1));
$user->setFirstName ($liFirstName->getWords(1));
//...
```

## Use it on Twig :

For generate 2 paragraphs :
```jinja
{{ paragraphs (2) }}
```

For generate 2, 3, 4 or 5 paragraphs :
```jinja
{{ paragraphs (2, 5) }}
```

For sentences and words: 
```jinja
{{ sentences () }}
{{ words () }}
```

# Configuration Reference

see `Resources/doc/configuration_reference.md`

# Licence

See `Resources/meta/LICENSE`.
