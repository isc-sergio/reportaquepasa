<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "categoria_reporte".
 *
 * @property int $id
 * @property int|null $activo
 * @property int|null $destacado fijo al comienzo de la lista
 * @property string $nombre
 */
class CategoriaReporte extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categoria_reporte';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['activo', 'destacado'], 'boolean'],
            [['nombre'], 'string', 'max' => 40],
            [['activo'], 'default', 'value' => true],
            [['destacado'], 'default', 'value' => false],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'activo' => 'Activo',
            'destacado' => 'Destacado',
            'nombre' => 'Nombre',
        ];
    }
}
