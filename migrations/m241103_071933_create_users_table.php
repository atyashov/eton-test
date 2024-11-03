<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m241103_071933_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey(),
            'fio' => $this->string()->notNull(),
            'username' => $this->string()->unique()->notNull(),
            'password' => $this->string(),
            'auth_key' => $this->string(32)->notNull(),
        ]);

        $this->insert('{{%users}}', [
            'fio' => 'admin',
            'username' => 'admin',
            'password' => 'admin',
            'auth_key' => Yii::$app->security->generateRandomString()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%users}}');
    }
}
