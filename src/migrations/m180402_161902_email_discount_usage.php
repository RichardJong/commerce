<?php
/**
 * @link https://craftcms.com/
 * @copyright Copyright (c) Pixel & Tonic, Inc.
 * @license https://craftcms.github.io/license/
 */

namespace craft\commerce\migrations;

use craft\db\Migration;

/**
 * m180402_161902_email_discount_usage migration.
 */
class m180402_161902_email_discount_usage extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('{{%commerce_email_discountuses}}', [
            'id' => $this->primaryKey(),
            'discountId' => $this->integer()->notNull(),
            'email' => $this->string()->notNull(),
            'uses' => $this->integer()->notNull()->unsigned(),
            'dateCreated' => $this->dateTime()->notNull(),
            'dateUpdated' => $this->dateTime()->notNull(),
            'uid' => $this->uid(),
        ]);

        $couponUseByEmail = (new \craft\db\Query())
            ->select('count(*) uses, orders.email email, discounts.id discountId')
            ->limit(null)
            ->from('{{%commerce_orders}} orders')
            ->where(['not', ['couponCode' => null]])
            ->leftJoin('{{%commerce_discounts}} discounts', '[[code]] = [[couponCode]]')
            ->groupBy('orders.email, orders.couponCode')->all();

        $rows = [];
        foreach ($couponUseByEmail as $usage)
        {
            $rows[] = array_values($usage);
        }

        $columns = [
            'uses',
            'email',
            'discountId'
        ];

        $this->batchInsert('{{%commerce_email_discountuses}}', $columns, $rows);

        return true;
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180402_161902_email_discount_usage cannot be reverted.\n";
        return false;
    }
}