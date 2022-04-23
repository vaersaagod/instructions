<?php
/**
 * Instructions plugin for Craft CMS
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

    /**
     * @inheritdoc
     */
    public function init(): void
    {
        parent::init();

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

}
