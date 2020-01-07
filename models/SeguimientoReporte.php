<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "seguimiento_reporte".
 *
 * @property int $reporte_id
 * @property int $usuario_id
 * @property string $actualizado
 * @property string|null $terminado
 * @property string|null $descripcion
 *
 * @property Reporte $reporte
 * @property Usuario $usuario
 */
class SeguimientoReporte extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'seguimiento_reporte';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['reporte_id', 'usuario_id'], 'required'],
            [['reporte_id', 'usuario_id'], 'integer'],
            [['actualizado', 'terminado'], 'safe'],
            [['descripcion'], 'string'],
            [['reporte_id'], 'unique'],
            [['reporte_id'], 'exist', 'skipOnError' => true, 'targetClass' => Reporte::className(), 'targetAttribute' => ['reporte_id' => 'id']],
            [['usuario_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['usuario_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'reporte_id' => 'Reporte ID',
            'usuario_id' => 'Usuario ID',
            'actualizado' => 'Actualizado',
            'terminado' => 'Terminado',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReporte()
    {
        return $this->hasOne(Reporte::className(), ['id' => 'reporte_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuario::className(), ['id' => 'usuario_id']);
    }
}
