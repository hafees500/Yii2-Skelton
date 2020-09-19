<?php

use yii\db\Migration;

class m180321_084241_create_table_auth_assignment extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%auth_assignment}}', [
            'item_name' => $this->string(64)->notNull(),
            'user_id' => $this->string(64)->notNull(),
            'created_at' => $this->integer(11),
        ], $tableOptions);

        $this->addPrimaryKey('primary_key', '{{%auth_assignment}}', ['item_name','user_id']);
    }

    public function safeDown()
    {
        $this->dropTable('{{%auth_assignment}}');
    }
}
