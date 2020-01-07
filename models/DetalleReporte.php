<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detalle_reporte".
 *
 * @property int $reporte_id
 * @property string $contenido descripcion, referencia
 *
 * @property Reporte $reporte
 */
class DetalleReporte extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'detalle_reporte';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['reporte_id', 'contenido'], 'required'],
            [['reporte_id'], 'integer'],
            [['contenido'], 'string'],
            [['reporte_id'], 'unique'],
            [['reporte_id'], 'exist', 'skipOnError' => true, 'targetClass' => Reporte::className(), 'targetAttribute' => ['reporte_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'reporte_id' => 'Reporte ID',
            'contenido' => 'Contenido',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReporte()
    {
        return $this->hasOne(Reporte::className(), ['id' => 'reporte_id']);
    }
}
