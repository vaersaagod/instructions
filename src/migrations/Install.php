<?php

namespace vaersaagod\instructions\migrations;

use Craft;
use craft\db\Migration;
use vaersaagod\instructions\fields\Instructions;

/**
 * Class Install
 * @package vaersaagod\instructions\migrations
 */
class Install extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        echo "> Migrating CP Field Instructions field type to Instructions...\n";

        $this->update('{{%fields}}', [
            'type' => Instructions::class
        ], ['type' => 'mmikkel\\cpfieldinstructions\\fields\\CpFieldInstructionsField']);

        return true;
    }
}
