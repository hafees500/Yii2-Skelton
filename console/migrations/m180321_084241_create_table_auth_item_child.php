<?php

use yii\db\Migration;

class m180321_084241_create_table_auth_item_child extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%auth_item_child}}', [
            'parent' => $this->string(64)->notNull(),
            'child' => $this->string(64)->notNull(),
        ], $tableOptions);

        $this->addPrimaryKey('primary_key', '{{%auth_item_child}}', ['parent','child']);
    }

    public function safeDown()
    {
        $this->dropTable('{{%auth_item_child}}');
    }
}
