<?php

/**
 * @Author: Hafees Rahman
 * @Date:   2018-08-13 17:44:43
 * @Email:   hafees@ndimensionz.com
 * @Project:   walk
 * @Filename:   m180813_121410_menu_management.php
 * @Last Modified by:   hafees
 * @Last Modified time: 2018-08-13 18:29:42
 */
use yii\db\Migration;

/**
 * Class m180813_121442_menu_management
 */
class m180813_121410_menu_management extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%menu_management}}', [
            'menu_id' => $this->primaryKey(),
            'menu_title' => $this->string(),
            'menu_type' => $this->string(),
            'menu_attr_class' => $this->string(),
            'menu_attr_id' => $this->string(),
            'menu_status' => $this->integer()->defaultValue(0),
            'menu_created' => $this->integer(11),
            'menu_updated' => $this->integer(11),
            'menu_created_user' => $this->integer(11),
        ], $tableOptions);
        // $this->addCommentOnColumn('menu_item','menu_item_type','0 = UL,1 = OL');
        // creates index for column `author_id`
        $this->createIndex(
            'menu-created-user',
            'menu_management',
            'menu_created_user'
        );
        // add foreign key for table `user`
        $this->addForeignKey(
            'menu-created-user',
            'menu_management',
            'menu_created_user',
            'user',
            'id',
            'CASCADE'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `user`
        $this->dropForeignKey(
            'menu-created-user',
            'menu_management'
        );

        // drops index for column `author_id`
        $this->dropIndex(
            'menu-created-user',
            'menu_management'
        );
        $this->dropTable('{{%menu_management}}');

    }
 
    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180813_121442_menu_management cannot be reverted.\n";

        return false;
    }
    */
}
