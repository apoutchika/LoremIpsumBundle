<?php

namespace Apoutchika\LoremIpsumBundle\Twig;

use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Bundle\TwigBundle\Loader\FilesystemLoader;

/**
 * ApoutchikaTwigLoremIpsumExtension
 *
 * Extension of twig for the LoremIpsum generator
 * @author Julien Philippon <contact@julienphilippon.fr>
 **/
class ApoutchikaTwigLoremIpsumExtension extends \Twig_Extension
{
     /**
      * The LoremIpsum generator
      * @var \Apoutchika\LoremIpsumBundle\Services\LoremIpsum $loremIpsum
      */
     private $loremIpsum;
     

     /**
      * Constructor
      * @param LoremIpsum $loremIpsum
      **/
     public function __construct (\Apoutchika\LoremIpsumBundle\Services\LoremIpsum $loremIpsum)
     {
	  $this->LoremIpsum = $loremIpsum;
     }


     public function getFunctions()
     {
	  return array(
	       new \Twig_SimpleFunction('paragraphs', array ($this, 'paragraphs'), array('is_safe' => array('html'))),
	       new \Twig_SimpleFunction('sentences', array ($this, 'sentences')),
	       new \Twig_SimpleFunction('words', array ($this, 'words')),
	       );
     }
     
     /**
      * get a text with aleatory number of paragraphs
      *
      *
      * <p>If you use any parameter, use the default configuration for generate the text</p>
      * <p>If you use only one parameter, the function return the exactely paragraphs nomber of this parameter</p>
      * <p>If you use two parameters, the function return aleatory paragraphs into the first and second parameter</p>
      *
      * @param int $nbrOrMin The exactely number of paragraphs or the minimum
      * @param int $max The maximum of paragraphs
      * @return text
      **/
     public function paragraphs ($nbrOrMin=null, $max=null)
     {
	  return $this->LoremIpsum->getParagraphs($nbrOrMin, $max);
     }

     /**
      * get a paragraph with aleatory number of sentences
      *
      *
      * <p>If you use any parameter, use the default configuration for generate the paragraph</p>
      * <p>If you use only one parameter, the function return the exactely sentences nomber of this parameter</p>
      * <p>If you use two parameters, the function return aleatory sentences into the first and second parameter</p>
      *
      * @param int $nbrOrMin The exactely number of sentences or the minimum
      * @param int $max The maximum of sentences
      * @return text
      **/
     public function sentences ($nbrOrMin=null, $max=null)
     {
	  return $this->LoremIpsum->getSentences($nbrOrMin, $max);
     }

     /**
      * get a sequences of aleatory number of words
      *
      *
      * <p>If you use any parameter, use the default configuration for generate the sentence</p>
      * <p>If you use only one parameter, the function return the exactely words nomber of this parameter</p>
      * <p>If you use two parameters, the function return aleatory words into the first and second parameter</p>
      *
      * @param int $nbrOrMin The exactely number of words or the minimum
      * @param int $max The maximum of words
      * @return text This is not a sentence because it does not have a capital and punctuation
      **/  
     public function words ($nbrOrMin=null, $max=null)
     {
	  return $this->LoremIpsum->getWords($nbrOrMin, $max);
     }

  
     public function getName()
     {
	  return 'apoutchika_lorem_ipsum_extension';
     }
}
