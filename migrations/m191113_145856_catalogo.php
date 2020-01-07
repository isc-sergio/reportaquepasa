<?php

use yii\db\Migration;

/**
 * Class m191113_145856_catalogo
 */
class m191113_145856_catalogo extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ENGINE=InnoDB';

        $this->createTable('tipo_reporte', [
            'id' => $this->primaryKey(),
            'activo' => $this->boolean()->defaultValue(0),
            'publico' => $this->boolean()->defaultValue(0),
            'orden' => $this->smallInteger()->defaultValue(0)->comment('determina el orden en la lista'),
            'nombre' => $this->string(64)->notNull(),
            'categoria' => $this->string(40),
            'etiquetas' => $this->string(128)->comment('mejora la búsqueda'),
            'descripcion' => $this->string(255)->notNull(),
            'unidad_responsable_reporte_id' => $this->integer()->notNull(),
            'FULLTEXT INDEX tipo_reporte_idx (nombre, categoria, etiquetas, descripcion)',
        ], $tableOptions);

        $this->createTable('categoria_reporte', [
            'id' => $this->primaryKey(),
            'activo' => $this->boolean()->defaultValue(0),
            'destacado' => $this->boolean()->defaultValue(0)->comment('fijo al comienzo de la lista'),
            'nombre' => $this->string(40)->notNull(),
        ], $tableOptions);

        $this->createTable('etiqueta_reporte', [
            'id' => $this->primaryKey(),
            'nombre' => $this->string(20)->notNull(),
        ], $tableOptions);

        $this->createTable('unidad_responsable_reporte', [
            'id' => $this->primaryKey(),
            'activo' => $this->boolean()->defaultValue(0),
            'nombre' => $this->string(255)->notNull(),
        ], $tableOptions);

        $this->createIndex('tipo_reporte_categoria_idx', 'tipo_reporte', 'categoria');

        $this->addForeignKey('tipo_reporte_unidad_responsable_reporte_fk', 'tipo_reporte', 'unidad_responsable_reporte_id', 'unidad_responsable_reporte', 'id', 'RESTRICT', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191113_145856_catalogo cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191113_145856_catalogo cannot be reverted.\n";

        return false;
    }
    */
}
