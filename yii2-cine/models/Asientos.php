<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "asientos".
 *
 * @property int $id_asiento_reservado
 * @property int $id_reserva
 * @property string $fila
 * @property int $numero
 *
 * @property Reservas $reserva
 */
class Asientos extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'asientos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_reserva', 'fila', 'numero'], 'required'],
            [['id_reserva', 'numero'], 'integer'],
            [['fila'], 'string', 'max' => 1],
            [['id_reserva', 'fila', 'numero'], 'unique', 'targetAttribute' => ['id_reserva', 'fila', 'numero']],
            [['id_reserva'], 'exist', 'skipOnError' => true, 'targetClass' => Reservas::class, 'targetAttribute' => ['id_reserva' => 'id_reserva']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_asiento_reservado' => Yii::t('app', 'Id Asiento Reservado'),
            'id_reserva' => Yii::t('app', 'Id Reserva'),
            'fila' => Yii::t('app', 'Fila'),
            'numero' => Yii::t('app', 'Numero'),
        ];
    }

    /**
     * Gets query for [[Reserva]].
     *
     * @return \yii\db\ActiveQuery|ReservasQuery
     */
    public function getReserva()
    {
        return $this->hasOne(Reservas::class, ['id_reserva' => 'id_reserva']);
    }

    /**
     * {@inheritdoc}
     * @return AsientosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AsientosQuery(get_called_class());
    }
    

}
