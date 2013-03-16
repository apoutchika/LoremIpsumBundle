<?php

namespace Apoutchika\LoremIpsumBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class ApoutchikaLoremIpsumExtension extends Extension
{
     /**
      * {@inheritDoc}
      */
     public function load(array $configs, ContainerBuilder $container)
     {	  
	  $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
	  $loader->load('services.yml');
	
	  $typeMinAndMax = array ('paragraphs', 'sentences', 'words');
	  
	  foreach ($configs[0] as $type => $value)
	  {
	       if (in_array ($type, $typeMinAndMax))
	       {
		    if (!is_array ($value))
		    {
			 $error = 'The apoutchika_lorem_ipsum.'.$type.' must be an array';
			 throw new \InvalidArgumentException ($error);
		    }
		    elseif (empty ($value['min']) && empty ($value['max']))
		    {
			 $error = 'The apoutchika_lorem_ipsum.'.$type.' parameter has no value min or max.';
			 throw new \InvalidArgumentException ($error);
		    }

		    if (!empty ($value['min']))
		    {
			 if (!is_int ($value['min']))
			 {
			      $error = 'The value of apoutchika_lorem_ipsum.'.type.'.min is not absolute int';
			      throw new \InvalidArgumentException ($error);
			 }
		       
			 $container->setParameter ('apoutchika_lorem_ipsum.'.$type.'.min', $value['min']);
		    }
		    if (!empty ($value['max']))
		    {
			 if (!is_int ($value['max']))
			 {
			      $error = 'The value of apoutchika_lorem_ipsum.'.$type.'.max is not int';
			      throw new \InvalidArgumentException ($error);
			 }
		       
			 $container->setParameter ('apoutchika_lorem_ipsum.'.$type.'.max', $value['max']);
		    }

		    if (!empty ($value['min']) && !empty ($value['max']) && $value['min'] > $value['max'])
		    {
			 $error = 'The value of apoutchika_lorem_ipsum.'.$type.'.min must be smaller than apoutchika_lorem_ipsum.'.$type.'.max';
			 throw new \InvalidArgumentException ($error);
		    }
	       }
	    
	       elseif ($type == 'quantity_punctuation')
	       {
		    if (!is_int ($value) || $value < 0 || $value > 100)
		    {
			 $error = 'The apoutchika_lorem_ipsum.quantity_punctuation must be a percentage';
			 throw new \InvalidArgumentException ($error);
		    }
		    $container->setParameter('apoutchika_lorem_ipsum.quantity_punctuation', $value);
	       }
	       elseif ($type == 'lorem_ipsum')
	       {
		    if (empty ($value))
		    {
			 $error = 'The apoutchika_lorem_ipsum.lorem_ipsum must be a empty';
			 throw new \InvalidArgumentException ($error);
		    }
		    $container->setParameter('apoutchika_lorem_ipsum.lorem_ipsum', $value);
	       }
	  }
     }


     public function getXsdValidationBasePath()
     {
	  return __DIR__.'/../Resources/config/';
     }
}
