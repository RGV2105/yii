<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "funciones".
 *
 * @property int $id_funcion
 * @property int $id_pelicula
 * @property int $id_sala
 * @property string $fecha_hora
 * @property float $precio
 * @property int $asientos_disponibles
 *
 * @property Peliculas $pelicula
 * @property Reservas[] $reservas
 * @property Salas $sala
 */
class Funciones extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'funciones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
{
    return [
        // Requeridos
        [['id_pelicula', 'id_sala', 'fecha_hora', 'precio', 'asientos_disponibles'], 'required'],

        // Tipos de datos
        [['id_pelicula', 'id_sala', 'asientos_disponibles'], 'integer'],
        [['precio'], 'number'],
        [['fecha_hora'], 'safe'],

        // Validaciones relacionales
        [['id_pelicula'], 'exist', 'skipOnError' => true, 'targetClass' => Peliculas::class, 'targetAttribute' => ['id_pelicula' => 'id_pelicula']],
        [['id_sala'], 'exist', 'skipOnError' => true, 'targetClass' => Salas::class, 'targetAttribute' => ['id_sala' => 'id_sala']],
    ];
}

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_funcion' => Yii::t('app', 'Id Funcion'),
            'id_pelicula' => Yii::t('app', 'Id Pelicula'),
            'id_sala' => Yii::t('app', 'Id Sala'),
            'fecha_hora' => Yii::t('app', 'Fecha Hora'),
            'precio' => Yii::t('app', 'Precio'),
            'asientos_disponibles' => Yii::t('app', 'Asientos Disponibles'),
        ];
    }

    /**
     * Gets query for [[Pelicula]].
     *
     * @return \yii\db\ActiveQuery|PeliculasQuery
     */
    public function getPelicula()
    {
        return $this->hasOne(Peliculas::class, ['id_pelicula' => 'id_pelicula']);
    }

    /**
     * Gets query for [[Reservas]].
     *
     * @return \yii\db\ActiveQuery|ReservasQuery
     */
    public function getReservas()
    {
        return $this->hasMany(Reservas::class, ['id_funcion' => 'id_funcion']);
    }

    /**
     * Gets query for [[Sala]].
     *
     * @return \yii\db\ActiveQuery|SalasQuery
     */
    public function getSala()
    {
        return $this->hasOne(Salas::class, ['id_sala' => 'id_sala']);
    }

    /**
     * {@inheritdoc}
     * @return FuncionesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FuncionesQuery(get_called_class());
    }

}
