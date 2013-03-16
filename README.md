LoremIpsumBundle
================

Generate paragraphs, sentences and words for your development

## Installation

### Download LoremIpsumBundle using composer

Add LoremIpsumBundle in your composer.json

``` js
{
    "require": {
        "friendsofsymfony/user-bundle": "*"
    }
}
```

### Enable the bundle on your kernel

``` php
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

## Use it with on controller :

``` php
<?php
$loremIpsum = $this->get('apoutchika_lorem_ipsum');

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

``` php
<?php

// for the customers database :

$liName = $this->get('apoutchika_lorem_ipsum');

$liName->setLoremIpsum ('Dupont Dupond Martin Durand Tessier'); // ....

$liFirstName = $this->get('apoutchika_lorem_ipsum');
$liFirstName->setLoremIpsum ('Marie Jean Michel Pierre Philippe'); //...

$user = new User;
$user->setName ($liName->getWords(1));
$user->setFirstName ($liFirstName->getWords(1));
//...
```

## Use on Twig :

For generate 2 paragraphs :
``` html+jinja
{{ paragraphs (2) }}
```

For generate 2, 3, 4 or 5 paragraphs :
``` html+jinja
{{ paragraphs (2, 5) }}
```

For sentences and words: 
``` html+jinja
{{ sentences () }}
{{ words () }}
```

# Configuration Reference

``` yaml
# app/config/config.yml

apoutchika_lorem_ipsum:
    paragraphs:
        min: 2      # Minimum of paragraphs
        max: 10     # Maximum of paragraphs
    sentences:
        min: 2      # Minimum of sentences in a paragraph
        max: 6      # Maximum of sentences in a paragraph
    words:
        min: 2      # Minimum of words in a sentence
        max: 30     # Maximum of words in a sentence
    quantity_punctuation: 10        # Percentage of punctuation in sentences
    lorem_ipsum: >                  # Words used for generate a lorem ipsum
        lorem ipsum dolor sit amet consectetur adipiscing elit sed non 
        risus suspendisse lectus tortor dignissim nec ultricies cras elementum ultrices
        diam maecenas ligula massa varius a semper congue euismod mi
        proin porttitor orci nonummy molestie enim est eleifend fermentum
        nisl erat duis arcu scelerisque vitae consequat in pretium pellentesque 
        ut volutpat libero pharetra tempor vestibulum bibendum augue praesent 
        egestas leo pede blandit odio eu dui sodales ante primis faucibus 
        luctus et posuere cubilia curae aliquam nibh mauris ac hendrerit velit 
        gravida ornare aenean vel suscipit pulvinar nulla sollicitudin fusce tempus 
        nunc turpis ullamcorper sapien eros rhoncus integer id felis curabitur 
        aliquet quis metus lobortis consectetuer morbi convallis vehicula tellus 
        quam feugiat purus iaculis tristique justo magna at mollis vulputate 
        sem vivamus placerat imperdiet cursus rutrum tincidunt lacus


# Licence

See `Resources/meta/LICENSE`.
