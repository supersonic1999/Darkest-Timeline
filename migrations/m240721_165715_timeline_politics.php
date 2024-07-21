<?php

use yii\db\Migration;

/**
 * Class m240721_165715_timeline_politics
 */
class m240721_165715_timeline_politics extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('timeline', 'is_political', $this->boolean());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('timeline', 'is_political');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240721_165715_timeline_politics cannot be reverted.\n";

        return false;
    }
    */
}
