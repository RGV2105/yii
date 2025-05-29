<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clientes".
 *
 * @property int $id_cliente
 * @property string $nombre
 * @property string $email
 * @property string|null $telefono
 * @property string|null $fecha_registro
 *
 * @property Reservas[] $reservas
 */
class Clientes extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clientes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
{
    return [
        // 'telefono' no puede ser null si es requerido, entonces mejor quitar 'default' si está en 'required'
        [['nombre', 'email', 'telefono', 'fecha_registro'], 'required'],

        // 'fecha_registro' como fecha válida (mejor usar 'date' en lugar de 'safe')
        [['fecha_registro'], 'date', 'format' => 'php:Y-m-d'],

        // nombre y email como string con max 100 caracteres
        [['nombre', 'email'], 'string', 'max' => 100],

        // teléfono max 10 caracteres, puedes agregar patrón si quieres validar formato
        [['telefono'], 'string', 'max' => 10],
        // ejemplo de patrón para teléfono: solo números, sin letras ni símbolos
        [['telefono'], 'match', 'pattern' => '/^\d{7,10}$/', 'message' => 'Ingrese un teléfono válido (7 a 10 dígitos).'],

        // email único y debe ser email válido
        [['email'], 'email'],
        [['email'], 'unique'],
    ];
}


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_cliente' => Yii::t('app', 'Id Cliente'),
            'nombre' => Yii::t('app', 'Nombre'),
            'email' => Yii::t('app', 'Email'),
            'telefono' => Yii::t('app', 'Telefono'),
            'fecha_registro' => Yii::t('app', 'Fecha Registro'),
        ];
    }

    /**
     * Gets query for [[Reservas]].
     *
     * @return \yii\db\ActiveQuery|ReservasQuery
     */
    public function getReservas()
    {
        return $this->hasMany(Reservas::class, ['id_cliente' => 'id_cliente']);
    }

    /**
     * {@inheritdoc}
     * @return ClientesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ClientesQuery(get_called_class());
    }

}
