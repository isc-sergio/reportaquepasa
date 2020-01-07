<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comentario_reporte".
 *
 * @property int $id
 * @property int $reporte_id
 * @property string $fecha
 * @property string $contenido
 * @property int|null $perfil_usuario_reporte_id
 * @property int|null $usuario_id
 *
 * @property PerfilUsuarioReporte $perfilUsuarioReporte
 * @property Reporte $reporte
 * @property Usuario $usuario
 */
class ComentarioReporte extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comentario_reporte';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['reporte_id', 'contenido'], 'required'],
            [['reporte_id', 'perfil_usuario_reporte_id', 'usuario_id'], 'integer'],
            [['fecha'], 'safe'],
            [['contenido'], 'string', 'max' => 255],
            [['perfil_usuario_reporte_id'], 'exist', 'skipOnError' => true, 'targetClass' => PerfilUsuarioReporte::className(), 'targetAttribute' => ['perfil_usuario_reporte_id' => 'id']],
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
            'id' => 'ID',
            'reporte_id' => 'Reporte ID',
            'fecha' => 'Fecha',
            'contenido' => 'Contenido',
            'perfil_usuario_reporte_id' => 'Perfil Usuario Reporte ID',
            'usuario_id' => 'Usuario ID',
        ];
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
