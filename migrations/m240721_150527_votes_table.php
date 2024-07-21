<?php

use yii\db\Migration;

/**
 * Class m240721_150527_votes_table
 */
class m240721_150527_votes_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('votes', [
            'id' => $this->primaryKey(),
            'timeline_id' => $this->integer()->notNull(),
            'session_id' => $this->string()->notNull(),
            'voted_at' => $this->string()->notNull(),
        ]);

        $this->addForeignKey('fk_timeline_votes', 'votes', 'timeline_id', 'timeline', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_timeline_votes', 'votes');
        $this->dropTable('votes');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240721_150527_votes_table cannot be reverted.\n";

        return false;
    }
    */
}
