<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "unidad_responsable_reporte".
 *
 * @property int $id
 * @property int|null $activo
 * @property string $nombre
 *
 * @property TipoReporte[] $tipoReportes
 */
class UnidadResponsableReporte extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'unidad_responsable_reporte';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['activo'], 'integer'],
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 255],
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
            'nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoReportes()
    {
        return $this->hasMany(TipoReporte::className(), ['unidad_responsable_reporte_id' => 'id']);
    }
}
