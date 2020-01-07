<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property int $id
 * @property int|null $activo
 * @property int|null $rol
 * @property string $nombre Nombre Completo
 * @property string $correo_electronico
 * @property string $contrasenia_cifrada
 * @property string $clave_autenticacion
 *
 * @property ComentarioReporte[] $comentarioReportes
 * @property SeguimientoReporte[] $seguimientoReportes
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['activo', 'rol'], 'integer'],
            [['nombre', 'correo_electronico', 'contrasenia_cifrada', 'clave_autenticacion'], 'required'],
            [['nombre', 'correo_electronico'], 'string', 'max' => 80],
            [['contrasenia_cifrada'], 'string', 'max' => 64],
            [['clave_autenticacion'], 'string', 'max' => 32],
            [['correo_electronico'], 'unique'],
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
            'rol' => 'Rol',
            'nombre' => 'Nombre',
            'correo_electronico' => 'Correo Electronico',
            'contrasenia_cifrada' => 'Contrasenia Cifrada',
            'clave_autenticacion' => 'Clave Autenticacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComentarioReportes()
    {
        return $this->hasMany(ComentarioReporte::className(), ['usuario_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeguimientoReportes()
    {
        return $this->hasMany(SeguimientoReporte::className(), ['usuario_id' => 'id']);
    }
}
