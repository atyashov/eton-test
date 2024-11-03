<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%projects}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 */
class m241103_073702_create_projects_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%projects}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'title' => $this->string(),
            'cost' => $this->integer(),
            'date_start' => $this->dateTime(),
            'date_handover' => $this->dateTime(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-projects-user_id}}',
            '{{%projects}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-projects-user_id}}',
            '{{%projects}}',
            'user_id',
            '{{%users}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-projects-user_id}}',
            '{{%projects}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-projects-user_id}}',
            '{{%projects}}'
        );

        $this->dropTable('{{%projects}}');
    }
}
