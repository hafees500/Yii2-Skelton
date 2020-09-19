<?php

/**
 * @Author: Hafees Rahman
 * @Date:   2018-08-11 08:34:11
 * @Email:   hafees@ndimensionz.com
 * @Project:   walk
 * @Filename:   m180811_030407_user_details.php
 * @Last Modified by:   hafees
 * @Last Modified time: 2018-08-11 08:55:23
 */
use yii\db\Migration;

/**
 * Class m180811_030407_user_details
 */
class m180811_030407_user_details extends Migration
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
        $this->createTable('{{%user_details}}', [
            'ud_id' => $this->primaryKey(),
            'ud_user_id' => $this->integer()->notNull(),
            'ud_gender' => $this->integer()->defaultValue(0),
            'ud_mobile' => $this->string(),
            'ud_location' => $this->string(),
            'ud_summary' => $this->text(),
            'ud_skype_id' => $this->string(),
            'ud_profile_name' => $this->string(),
            'ud_profile_pic' => $this->string(),
            'ud_role' => $this->string(),
            'ud_status' => $this->integer()->notNull(),
            'ud_created_at' => $this->integer(11),
            'ud_updated_at' => $this->integer(11),
        ], $tableOptions);

        $this->addCommentOnColumn('user_details','ud_gender','1 = Male,2 = Female, 3 = Other');
        $this->addCommentOnColumn('user_details','ud_status','10 = Active,0 = Deleted, 9 = Suspended');
        $this->addCommentOnColumn('user_details','ud_role','User Defined Roles');

        // creates index for column `author_id`
        $this->createIndex(
            'ud-user',
            'user_details',
            'ud_user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'ud-user',
            'user_details',
            'ud_user_id',
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
            'ud-user',
            'user_details'
        );

        // drops index for column `author_id`
        $this->dropIndex(
            'ud-user',
            'user_details'
        );

        $this->dropTable('{{%user_details}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180811_030407_user_details cannot be reverted.\n";

        return false;
    }
    */
}
