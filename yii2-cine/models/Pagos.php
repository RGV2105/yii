<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pagos".
 *
 * @property int $id_pago
 * @property int $id_reserva
 * @property float $monto
 * @property string $metodo_pago
 * @property string|null $fecha_pago
 * @property string|null $estado
 * @property string|null $transaccion_id
 *
 * @property Reservas $reserva
 */
class Pagos extends \yii\db\ActiveRecord
{

    /**
     * ENUM field values
     */
    const METODO_PAGO_TARJETA = 'tarjeta';
    const METODO_PAGO_EFECTIVO = 'efectivo';
    const METODO_PAGO_TRANSFERENCIA = 'transferencia';
    const METODO_PAGO_APP = 'app';
    const ESTADO_PENDIENTE = 'pendiente';
    const ESTADO_COMPLETADO = 'completado';
    const ESTADO_REEMBOLSADO = 'reembolsado';
    const ESTADO_FALLIDO = 'fallido';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pagos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['transaccion_id'], 'default', 'value' => null],
            [['estado'], 'default', 'value' => 'pendiente'],
            [['id_reserva', 'monto', 'metodo_pago'], 'required'],
            [['id_reserva'], 'integer'],
            [['monto'], 'number'],
            [['metodo_pago', 'estado'], 'string'],
            [['fecha_pago'], 'safe'],
            [['transaccion_id'], 'string', 'max' => 50],
            ['metodo_pago', 'in', 'range' => array_keys(self::optsMetodoPago())],
            ['estado', 'in', 'range' => array_keys(self::optsEstado())],
            [['id_reserva'], 'exist', 'skipOnError' => true, 'targetClass' => Reservas::class, 'targetAttribute' => ['id_reserva' => 'id_reserva']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pago' => Yii::t('app', 'Id Pago'),
            'id_reserva' => Yii::t('app', 'Id Reserva'),
            'monto' => Yii::t('app', 'Monto'),
            'metodo_pago' => Yii::t('app', 'Metodo Pago'),
            'fecha_pago' => Yii::t('app', 'Fecha Pago'),
            'estado' => Yii::t('app', 'Estado'),
            'transaccion_id' => Yii::t('app', 'Transaccion ID'),
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
     * @return PagosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PagosQuery(get_called_class());
    }


    /**
     * column metodo_pago ENUM value labels
     * @return string[]
     */
    public static function optsMetodoPago()
    {
        return [
            self::METODO_PAGO_TARJETA => Yii::t('app', 'tarjeta'),
            self::METODO_PAGO_EFECTIVO => Yii::t('app', 'efectivo'),
            self::METODO_PAGO_TRANSFERENCIA => Yii::t('app', 'transferencia'),
            self::METODO_PAGO_APP => Yii::t('app', 'app'),
        ];
    }

    /**
     * column estado ENUM value labels
     * @return string[]
     */
    public static function optsEstado()
    {
        return [
            self::ESTADO_PENDIENTE => Yii::t('app', 'pendiente'),
            self::ESTADO_COMPLETADO => Yii::t('app', 'completado'),
            self::ESTADO_REEMBOLSADO => Yii::t('app', 'reembolsado'),
            self::ESTADO_FALLIDO => Yii::t('app', 'fallido'),
        ];
    }

    /**
     * @return string
     */
    public function displayMetodoPago()
    {
        return self::optsMetodoPago()[$this->metodo_pago];
    }

    /**
     * @return bool
     */
    public function isMetodoPagoTarjeta()
    {
        return $this->metodo_pago === self::METODO_PAGO_TARJETA;
    }

    public function setMetodoPagoToTarjeta()
    {
        $this->metodo_pago = self::METODO_PAGO_TARJETA;
    }

    /**
     * @return bool
     */
    public function isMetodoPagoEfectivo()
    {
        return $this->metodo_pago === self::METODO_PAGO_EFECTIVO;
    }

    public function setMetodoPagoToEfectivo()
    {
        $this->metodo_pago = self::METODO_PAGO_EFECTIVO;
    }

    /**
     * @return bool
     */
    public function isMetodoPagoTransferencia()
    {
        return $this->metodo_pago === self::METODO_PAGO_TRANSFERENCIA;
    }

    public function setMetodoPagoToTransferencia()
    {
        $this->metodo_pago = self::METODO_PAGO_TRANSFERENCIA;
    }

    /**
     * @return bool
     */
    public function isMetodoPagoApp()
    {
        return $this->metodo_pago === self::METODO_PAGO_APP;
    }

    public function setMetodoPagoToApp()
    {
        $this->metodo_pago = self::METODO_PAGO_APP;
    }

    /**
     * @return string
     */
    public function displayEstado()
    {
        return self::optsEstado()[$this->estado];
    }

    /**
     * @return bool
     */
    public function isEstadoPendiente()
    {
        return $this->estado === self::ESTADO_PENDIENTE;
    }

    public function setEstadoToPendiente()
    {
        $this->estado = self::ESTADO_PENDIENTE;
    }

    /**
     * @return bool
     */
    public function isEstadoCompletado()
    {
        return $this->estado === self::ESTADO_COMPLETADO;
    }

    public function setEstadoToCompletado()
    {
        $this->estado = self::ESTADO_COMPLETADO;
    }

    /**
     * @return bool
     */
    public function isEstadoReembolsado()
    {
        return $this->estado === self::ESTADO_REEMBOLSADO;
    }

    public function setEstadoToReembolsado()
    {
        $this->estado = self::ESTADO_REEMBOLSADO;
    }

    /**
     * @return bool
     */
    public function isEstadoFallido()
    {
        return $this->estado === self::ESTADO_FALLIDO;
    }

    public function setEstadoToFallido()
    {
        $this->estado = self::ESTADO_FALLIDO;
    }

    public function beforeSave($insert)
{
    if (parent::beforeSave($insert)) {
        if ($insert && empty($this->transaccion_id)) {
            // Generar un ID único, por ejemplo un hash con prefijo + timestamp + random
            $this->transaccion_id = 'TX-' . time() . '-' . substr(md5(uniqid(mt_rand(), true)), 0, 8);
        }
        return true;
    } else {
        return false;
    }
}

}
