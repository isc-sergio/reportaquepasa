<?php

use yii\db\Migration;

/**
 * Class m191121_204259_reporte
 */
class m191121_204259_reporte extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ENGINE=InnoDB';

        $this->createTable('reporte', [
            'id' => $this->primaryKey(),
            'tipo_reporte_id' => $this->integer()->notNull(),
            'estado' => $this->string(8),
            'fecha' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            //'folio' => $this->string(10)->notNull(),
            //'ubicacion POINT DEFAULT NULL',
            'latitud' => $this->string(64),
            'longitud' => $this->string(64),
            'colonia' => $this->string(64),
            'calle' => $this->string(64),
            'entre_calles' => $this->string(128),
            'perfil_usuario_reporte_id' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createTable('detalle_reporte', [
            'reporte_id' => $this->integer()->notNull(),
            'contenido' => $this->text()->notNull()->comment('descripcion, referencia'),
            'PRIMARY KEY(reporte_id)',
        ], $tableOptions);

        $this->createTable('seguimiento_reporte', [
            'reporte_id' => $this->integer()->notNull(),
            'usuario_id' => $this->integer()->notNull(),
            'actualizado' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'terminado' => $this->date(),
            'descripcion' => $this->text(),
            'PRIMARY KEY(reporte_id)',
        ], $tableOptions);

        $this->createTable('comentario_reporte', [
            'id' => $this->primaryKey(),
            'reporte_id' => $this->integer()->notNull(),
            'fecha' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'contenido' => $this->string(255)->notNull(),
            'perfil_usuario_reporte_id' => $this->integer(),
            'usuario_id' => $this->integer(),
        ], $tableOptions);

        $this->createTable('perfil_usuario_reporte', [
            'id' => $this->primaryKey(),
            'token_acceso' => $this->string(48)->notNull()->unique(),
            'nombre' => $this->string(64),
            'informacion' => $this->string(128),
        ], $tableOptions);

        $this->createTable('usuario', [
            'id' => $this->primaryKey(),
            'activo' => $this->boolean()->defaultValue(0),
            'rol' => $this->smallInteger()->defaultValue(0),
            'nombre' => $this->string(80)->notNull()->comment('Nombre Completo'),
            'correo_electronico' => $this->string(80)->notNull()->unique(),
            'contrasenia_cifrada' => $this->string(64)->notNull(),
            'clave_autenticacion' => $this->string(32)->notNull(),
        ], $tableOptions);

        $this->createIndex('reporte_estado_idx', 'reporte', 'estado');

        $this->addForeignKey('reporte_tipo_reporte_fk', 'reporte', 'tipo_reporte_id', 'tipo_reporte', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('reporte_perfil_usuario_reporte_fk', 'reporte', 'perfil_usuario_reporte_id', 'perfil_usuario_reporte', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('detalle_reporte_reporte_fk', 'detalle_reporte', 'reporte_id', 'reporte', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('seguimiento_reporte_reporte_fk', 'seguimiento_reporte', 'reporte_id', 'reporte', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('seguimiento_reporte_usuario_fk', 'seguimiento_reporte', 'usuario_id', 'usuario', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('comentario_reporte_reporte_fk', 'comentario_reporte', 'reporte_id', 'reporte', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('comentario_reporte_perfil_usuario_reporte_fk', 'comentario_reporte', 'perfil_usuario_reporte_id', 'perfil_usuario_reporte', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('comentario_reporte_usuario_fk', 'comentario_reporte', 'usuario_id', 'usuario', 'id', 'RESTRICT', 'CASCADE');

        $this->insert('usuario', [
            'id' => 1,
            'activo' => 1,
            'rol' => 101,
            'nombre' => 'Administrador',
            'correo_electronico' => 'admin_reporta@',
            //u1 admin
            'contrasenia_cifrada' => '$2y$13$fKvj64TbQrVtGZyoDGpF/.4LwIcTnu4m25YQ51zWu8mC4ZTFpUnAe',
            'clave_autenticacion' => 'PYgghjylNdck21pyUtMN-lQiFq0--UdZ',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191121_204259_reporte cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191121_204259_reporte cannot be reverted.\n";

        return false;
    }
    */
}
