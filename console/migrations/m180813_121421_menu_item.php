<?php

/**
 * @Author: Hafees Rahman
 * @Date:   2018-08-13 17:44:12
 * @Email:   hafees@ndimensionz.com
 * @Project:   walk
 * @Filename:   m180813_121421_menu_item.php
 * @Last Modified by:   hafees
 * @Last Modified time: 2018-08-15 16:07:06
 */
use yii\db\Migration;

/**
 * Class m180813_121410_menu_item
 */
class m180813_121421_menu_item extends Migration
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
        $this->createTable('{{%menu_item}}', [
            'menu_item_id' => $this->primaryKey(),
            'menu_item_title' => $this->string(),
            'menu_item_label' => $this->string(),
            'menu_item_type' => $this->integer(11),
            'menu_item_link' => $this->string(),
            'menu_item_parent' => $this->integer(11),
            'menu_item_home' => $this->integer(11),
            'menu_item_attr_class' => $this->string(),
            'menu_item_attr_id' => $this->string(),
            'menu_item_status' => $this->integer()->defaultValue(10),
            'menu_item_created' => $this->integer(11),
            'menu_item_updated' => $this->integer(11),
            'menu_item_created_user' => $this->integer(11),
        ], $tableOptions);

        $this->addCommentOnColumn('menu_item','menu_item_type','0 = UL,1 = OL');

        $this->createIndex(
            'menu-item-created-user',
            'menu_item',
            'menu_item_created_user'
        );
        // add foreign key for table `user`
        $this->addForeignKey(
            'menu-item-created-user',
            'menu_item',
            'menu_item_created_user',
            'user',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'menu-item-home',
            'menu_item',
            'menu_item_home'
        );
        // add foreign key for table `user`
        $this->addForeignKey(
            'menu-item-home',
            'menu_item',
            'menu_item_home',
            'menu_management',
            'menu_id',
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
            'menu-item-created-user',
            'menu_item'
        );

        // drops index for column `author_id`
        $this->dropIndex(
            'menu-item-created-user',
            'menu_item'
        );

         // drops foreign key for table `user`
        $this->dropForeignKey(
            'menu-item-home',
            'menu_item'
        );

        // drops index for column `author_id`
        $this->dropIndex(
            'menu-item-home',
            'menu_item'
        );


        $this->dropTable('{{%menu_item}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180813_121410_menu_item cannot be reverted.\n";

        return false;
    }
    */
}
