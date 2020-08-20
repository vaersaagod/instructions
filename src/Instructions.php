<?php
/**
 * Instructions plugin for Craft CMS 3.x
 *
 * Adds an _Instructions_ field type that can be used to render field instructions as native UI elements inside Matrix field layouts.
 *
 * @link      https://vaersaagod.no
 * @copyright Copyright (c) 2020 Værsågod AS
 */

namespace vaersaagod\instructions;

use vaersaagod\instructions\fields\Instructions as InstructionsField;

use Craft;
use craft\base\Plugin;
use craft\events\RegisterComponentTypesEvent;
use craft\services\Fields;
use craft\services\Plugins;
use craft\events\PluginEvent;

use yii\base\Event;

/**
 * Class Instructions
 *
 * @author    Værsågod AS
 * @package   Instructions
 * @since     1.0.0
 *
 */
class Instructions extends Plugin
{
    // Static Properties
    // =========================================================================

    /**
     * @var Instructions
     */
    public static $plugin;

    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public $schemaVersion = '1.0.0';

    /**
     * @var bool
     */
    public $hasCpSettings = false;

    /**
     * @var bool
     */
    public $hasCpSection = false;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        self::$plugin = $this;

        Event::on(
            Plugins::class,
            Plugins::EVENT_AFTER_INSTALL_PLUGIN,
            function (PluginEvent $event) {
                if ($event->plugin === $this) {
                }
            }
        );

        Event::on(
            Fields::class,
            Fields::EVENT_REGISTER_FIELD_TYPES,
            function (RegisterComponentTypesEvent $event) {
                $event->types[] = InstructionsField::class;
            }
        );

        Craft::info(
            Craft::t(
                'instructions',
                '{name} plugin loaded',
                ['name' => $this->name]
            ),
            __METHOD__
        );
    }

    // Protected Methods
    // =========================================================================

}
