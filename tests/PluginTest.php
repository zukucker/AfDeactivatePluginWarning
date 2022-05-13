<?php

namespace AfDeactivatePluginWarning\Tests;

use AfDeactivatePluginWarning\AfDeactivatePluginWarning as Plugin;
use Shopware\Components\Test\Plugin\TestCase;

class PluginTest extends TestCase
{
    protected static $ensureLoadedPlugins = [
        'AfDeactivatePluginWarning' => []
    ];

    public function testCanCreateInstance()
    {
        /** @var Plugin $plugin */
        $plugin = Shopware()->Container()->get('kernel')->getPlugins()['AfDeactivatePluginWarning'];

        $this->assertInstanceOf(Plugin::class, $plugin);
    }
}
