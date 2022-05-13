<?php

namespace AfDeactivatePluginWarning;

use Shopware\Components\Plugin;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Shopware-Plugin AfDeactivatePluginWarning.
 */
class AfDeactivatePluginWarning extends Plugin
{

    /**
    * @param ContainerBuilder $container
    */
    public function build(ContainerBuilder $container)
    {
        $container->setParameter('af_deactivate_plugin_warning.plugin_dir', $this->getPath());
        parent::build($container);
    }

    public static function getSubscribedEvents(){
      return [
        'Enlight_Controller_Action_PreDispatch_Backend' => 'onBackend',
      ];
    }

    public function onBackend(){
      $config = $this->container->get('shopware.plugin.cached_config_reader')->getByPluginName($this->getName());

      if(!$config["AfActivatePluginWarning"]){
        setcookie("checkedForSecurityUpdates", 1);
      }else{
        setcookie("checkedForSecurityUpdates", null);
      }
    }

}
