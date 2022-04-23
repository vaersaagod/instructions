<?php

namespace vaersaagod\instructions\fields;

use vaersaagod\instructions\assetbundles\InstructionsBundle;

use Craft;
use craft\base\ElementInterface;
use craft\base\Field;
use craft\fieldlayoutelements\Tip;

/**
 * Class Instructions
 * @package vaersaagod\instructions\fields
 */
class Instructions extends Field
{

    /** @var string */
    const STYLE_TIP = 'tip';

    /** @var string */
    const STYLE_WARNING = 'warning';

    /** @var string */
    public $style;

    /**
     * @inheritdoc
     */
    public static function displayName(): string
    {
        return Craft::t('site', 'Instructions');
    }

    /**
     * @inheritdoc
     */
    public static function hasContentColumn(): bool
    {
        return false;
    }

    /**
     * @inheritdoc
     */
    public function getSettingsHtml(): ?string
    {
        return Craft::$app->getView()->renderTemplate('instructions/_settings',
            [
                'field' => $this
            ]);
    }

    /**
     * @inheritdoc
     */
    public function getInputHtml($value, ElementInterface $element = null): string
    {
        Craft::$app->getView()->registerAssetBundle(InstructionsBundle::class);

        $style = $this->style === self::STYLE_WARNING ? Tip::STYLE_WARNING : Tip::STYLE_TIP;

        $tip = new Tip([
            'tip' => $this->instructions,
            'style' => $style,
        ]);

        return $tip->formHtml();
    }
}
