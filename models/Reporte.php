<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reporte".
 *
 * @property int $id
 * @property int $tipo_reporte_id
 * @property string|null $estado
 * @property string $fecha
 * @property string|null $latitud
 * @property string|null $longitud
 * @property string|null $colonia
 * @property string|null $calle
 * @property string|null $entre_calles
 * @property int $perfil_usuario_reporte_id
 *
 * @property ComentarioReporte[] $comentarioReportes
 * @property DetalleReporte $detalleReporte
 * @property PerfilUsuarioReporte $perfilUsuarioReporte
 * @property TipoReporte $tipoReporte
 * @property SeguimientoReporte $seguimientoReporte
 */
class Reporte extends \yii\db\ActiveRecord
{
    public $foto;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reporte';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipo_reporte_id', 'perfil_usuario_reporte_id'], 'required'],
            [['tipo_reporte_id', 'perfil_usuario_reporte_id'], 'integer'],
            [['fecha'], 'safe'],
            [['estado'], 'string', 'max' => 8],
            [['latitud', 'longitud', 'colonia', 'calle'], 'string', 'max' => 64],
            [['entre_calles'], 'string', 'max' => 128],
            [['perfil_usuario_reporte_id'], 'exist', 'skipOnError' => true, 'targetClass' => PerfilUsuarioReporte::className(), 'targetAttribute' => ['perfil_usuario_reporte_id' => 'id']],
            [['tipo_reporte_id'], 'exist', 'skipOnError' => true, 'targetClass' => TipoReporte::className(), 'targetAttribute' => ['tipo_reporte_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tipo_reporte_id' => 'Tipo Reporte ID',
            'estado' => 'Estado',
            'fecha' => 'Fecha',
            'latitud' => 'Latitud',
            'longitud' => 'Longitud',
            'colonia' => 'Colonia',
            'calle' => 'Calle',
            'entre_calles' => 'Entre Calles',
            'perfil_usuario_reporte_id' => 'Perfil Usuario Reporte ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComentarioReportes()
    {
        return $this->hasMany(ComentarioReporte::className(), ['reporte_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleReporte()
    {
        return $this->hasOne(DetalleReporte::className(), ['reporte_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerfilUsuarioReporte()
    {
        return $this->hasOne(PerfilUsuarioReporte::className(), ['id' => 'perfil_usuario_reporte_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoReporte()
    {
        return $this->hasOne(TipoReporte::className(), ['id' => 'tipo_reporte_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeguimientoReporte()
    {
        return $this->hasOne(SeguimientoReporte::className(), ['reporte_id' => 'id']);
    }
}
