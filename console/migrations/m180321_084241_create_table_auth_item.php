<?php

use yii\db\Migration;

class m180321_084241_create_table_auth_item extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%auth_item}}', [
            'name' => $this->string(64)->notNull()->append('PRIMARY KEY'),
            'type' => $this->smallInteger(6)->notNull(),
            'description' => $this->text(),
            'rule_name' => $this->string(64),
            'data' => $this->binary(),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
        ], $tableOptions);
    }

    public function safeDown()
    {
        $this->dropTable('{{%auth_item}}');
    }
}
