<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo_reporte".
 *
 * @property int $id
 * @property int|null $activo
 * @property int|null $publico
 * @property int|null $orden determina el orden en la lista
 * @property string $nombre
 * @property string|null $categoria
 * @property string|null $etiquetas mejora la búsqueda
 * @property string $descripcion
 * @property int $unidad_responsable_reporte_id
 *
 * @property Reporte[] $reportes
 * @property UnidadResponsableReporte $unidadResponsableReporte
 */
class TipoReporte extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipo_reporte';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['activo', 'publico'], 'boolean'],
            [['orden', 'unidad_responsable_reporte_id'], 'integer'],
            [['nombre', 'descripcion', 'unidad_responsable_reporte_id'], 'required'],
            [['nombre'], 'string', 'max' => 64],
            [['categoria'], 'string', 'max' => 40],
            [['etiquetas'], 'string', 'max' => 128],
            [['descripcion'], 'string', 'max' => 255],
            [['activo'], 'default', 'value' => true],
            [['publico'], 'default', 'value' => false],
            [['orden'], 'default', 'value' => 0],
            [['categoria'], 'default', 'value' => null],
            [['unidad_responsable_reporte_id'], 'exist', 'skipOnError' => true, 'targetClass' => UnidadResponsableReporte::className(), 'targetAttribute' => ['unidad_responsable_reporte_id' => 'id']],
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
            'publico' => 'Público',
            'orden' => 'Orden',
            'nombre' => 'Nombre',
            'categoria' => 'Categoría',
            'etiquetas' => 'Etiquetas',
            'descripcion' => 'Descripción',
            'unidad_responsable_reporte_id' => 'Unidad Responsable Reporte ID',
        ];
    }

    /**
     * @inheritdoc
     */
    public function fields()
    {
        $fields = parent::fields();

        $fields['unidad_responsable'] = function ($model) {
            return $model->unidadResponsableReporte->nombre;
        };

        $fields['atendidos'] = function ($model) {
            return $model->id * 123;
        };

        unset(
            $fields['activo'],
            $fields['publico'],
            $fields['orden'],
            $fields['etiquetas'],
            $fields['unidad_responsable_reporte_id']
        );

        return $fields;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReportes()
    {
        return $this->hasMany(Reporte::className(), ['tipo_reporte_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnidadResponsableReporte()
    {
        return $this->hasOne(UnidadResponsableReporte::className(), ['id' => 'unidad_responsable_reporte_id']);
    }
}
