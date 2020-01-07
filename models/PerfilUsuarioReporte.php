<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "perfil_usuario_reporte".
 *
 * @property int $id
 * @property string $token_acceso
 * @property string|null $nombre
 * @property string|null $informacion
 *
 * @property ComentarioReporte[] $comentarioReportes
 * @property Reporte[] $reportes
 */
class PerfilUsuarioReporte extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'perfil_usuario_reporte';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['token_acceso'], 'required'],
            [['token_acceso'], 'string', 'max' => 48],
            [['nombre'], 'string', 'max' => 64],
            [['informacion'], 'string', 'max' => 128],
            [['token_acceso'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'token_acceso' => 'Token Acceso',
            'nombre' => 'Nombre',
            'informacion' => 'Informacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComentarioReportes()
    {
        return $this->hasMany(ComentarioReporte::className(), ['perfil_usuario_reporte_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReportes()
    {
        return $this->hasMany(Reporte::className(), ['perfil_usuario_reporte_id' => 'id']);
    }
}
