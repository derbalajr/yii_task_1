<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%project}}`.
 */
class m240927_221840_create_project_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%project}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'contract' => $this->integer(),
        ]);

        $this->addForeignKey(
            'fk-project-contract',
            'project',
            'contract',
            'contract',
            'id',
            'SET NULL'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-project-contract', 'project');
        $this->dropTable('{{%project}}');
    }
}
