ApoutchikaLoremIpsumBundle Configuration Reference
==================================================

All available configuration options are listed below with their default values.

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
```
