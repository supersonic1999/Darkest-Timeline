<?php

use yii\db\Migration;

/**
 * Class m240720_152138_timeline
 */
class m240720_152138_timeline extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('timeline', [
            'id' => $this->primaryKey(),
            'date' => $this->string()->notNull(),
            'dotColor' => $this->string(),
            'icon' => $this->string(),
            'title' => $this->string()->notNull(),
            'text' => $this->string(2000),
            'suggester' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('timeline');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240720_152138_timeline cannot be reverted.\n";

        return false;
    }
    */
}
