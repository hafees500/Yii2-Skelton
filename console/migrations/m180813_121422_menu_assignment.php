<?php

/**
 * @Author: Hafees Rahman
 * @Date:   2018-08-13 17:44:24
 * @Email:   hafees@ndimensionz.com
 * @Project:   walk
 * @Filename:   m180813_121422_menu_assignment.php
 * @Last Modified by:   hafees
 * @Last Modified time: 2018-08-15 11:51:28
 */
use yii\db\Migration;

/**
 * Class m180813_121422_menu_assignment
 */
class m180813_121422_menu_assignment extends Migration
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
        $this->createTable('{{%menu_assignment}}', [
            'menu_assignment_id' => $this->primaryKey(),
            'menu_assignment_role' => $this->string(),
            'menu_assignment_type' => $this->string(),
            'menu_assignment_home' => $this->integer(11),
            'menu_assignment_status' => $this->integer()->defaultValue(10),
            'menu_assignment_created' => $this->integer(11),
            'menu_assignment_updated' => $this->integer(11),
            'menu_assignment_created_user' => $this->integer(11),
        ], $tableOptions);
        // $this->addCommentOnColumn('menu_item','menu_item_type','0 = UL,1 = OL');

        $this->createIndex(
            'menu-assignment-created-user',
            'menu_assignment',
            'menu_assignment_created_user'
        );
        // add foreign key for table `user`
        $this->addForeignKey(
            'menu-assignment-created-user',
            'menu_assignment',
            'menu_assignment_created_user',
            'user',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'menu-assignment-home',
            'menu_assignment',
            'menu_assignment_home'
        );
        // add foreign key for table `user`
        $this->addForeignKey(
            'menu-assignment-home',
            'menu_assignment',
            'menu_assignment_home',
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
            'menu-assignment-created-user',
            'menu_assignment'
        );

        // drops index for column `author_id`
        $this->dropIndex(
            'menu-assignment-created-user',
            'menu_assignment'
        );

         // drops foreign key for table `user`
        $this->dropForeignKey(
            'menu-assignment-home',
            'menu_assignment'
        );

        // drops index for column `author_id`
        $this->dropIndex(
            'menu-assignment-home',
            'menu_assignment'
        );

         // drops foreign key for table `user`


        $this->dropTable('{{%menu_assignment}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180813_121422_menu_assignment cannot be reverted.\n";

        return false;
    }
    */
}
