<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reservas".
 *
 * @property int $id_reserva
 * @property int $id_cliente
 * @property int $id_funcion
 * @property string|null $fecha_reserva
 * @property int $cantidad_asientos
 * @property string|null $estado
 * @property string|null $codigo_confirmacion
 *
 * @property Asientos[] $asientos
 * @property Clientes $cliente
 * @property Funciones $funcion
 * @property Pagos[] $pagos
 */
class Reservas extends \yii\db\ActiveRecord
{

    /**
     * ENUM field values
     */
    const ESTADO_PENDIENTE = 'pendiente';
    const ESTADO_CONFIRMADA = 'confirmada';
    const ESTADO_CANCELADA = 'cancelada';
    const ESTADO_UTILIZADA = 'utilizada';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reservas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
{
    return [
        // Campo no requerido, valor por defecto null
        [['codigo_confirmacion'], 'default', 'value' => null],

        // Estado no requerido (por defecto 'pendiente')
        [['estado'], 'default', 'value' => 'pendiente'],

        // Todos estos campos son requeridos
        [['id_cliente', 'id_funcion', 'cantidad_asientos', 'fecha_reserva', 'estado'], 'required'],

        // Tipos de datos
        [['id_cliente', 'id_funcion', 'cantidad_asientos'], 'integer'],
        [['fecha_reserva'], 'safe'],
        [['estado'], 'string'],
        [['codigo_confirmacion'], 'string', 'max' => 20],

        // Valores válidos
        ['estado', 'in', 'range' => array_keys(self::optsEstado())],
        [['codigo_confirmacion'], 'unique'],

        // Validaciones relacionales
        [['id_cliente'], 'exist', 'skipOnError' => true, 'targetClass' => Clientes::class, 'targetAttribute' => ['id_cliente' => 'id_cliente']],
        [['id_funcion'], 'exist', 'skipOnError' => true, 'targetClass' => Funciones::class, 'targetAttribute' => ['id_funcion' => 'id_funcion']],
    ];
}


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_reserva' => Yii::t('app', 'Id Reserva'),
            'id_cliente' => Yii::t('app', 'Id Cliente'),
            'id_funcion' => Yii::t('app', 'Id Funcion'),
            'fecha_reserva' => Yii::t('app', 'Fecha Reserva'),
            'cantidad_asientos' => Yii::t('app', 'Cantidad Asientos'),
            'estado' => Yii::t('app', 'Estado'),
            'codigo_confirmacion' => Yii::t('app', 'Codigo Confirmacion'),
        ];
    }

    /**
     * Gets query for [[Asientos]].
     *
     * @return \yii\db\ActiveQuery|AsientosQuery
     */
    public function getAsientos()
    {
        return $this->hasMany(Asientos::class, ['id_reserva' => 'id_reserva']);
    }

    /**
     * Gets query for [[Cliente]].
     *
     * @return \yii\db\ActiveQuery|ClientesQuery
     */
    public function getCliente()
    {
        return $this->hasOne(Clientes::class, ['id_cliente' => 'id_cliente']);
    }

    /**
     * Gets query for [[Funcion]].
     *
     * @return \yii\db\ActiveQuery|FuncionesQuery
     */
    public function getFuncion()
    {
        return $this->hasOne(Funciones::class, ['id_funcion' => 'id_funcion']);
    }

    /**
     * Gets query for [[Pagos]].
     *
     * @return \yii\db\ActiveQuery|PagosQuery
     */
    public function getPagos()
    {
        return $this->hasMany(Pagos::class, ['id_reserva' => 'id_reserva']);
    }

    /**
     * {@inheritdoc}
     * @return ReservasQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ReservasQuery(get_called_class());
    }


    /**
     * column estado ENUM value labels
     * @return string[]
     */
    public static function optsEstado()
    {
        return [
            self::ESTADO_PENDIENTE => Yii::t('app', 'pendiente'),
            self::ESTADO_CONFIRMADA => Yii::t('app', 'confirmada'),
            self::ESTADO_CANCELADA => Yii::t('app', 'cancelada'),
            self::ESTADO_UTILIZADA => Yii::t('app', 'utilizada'),
        ];
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
    public function isEstadoConfirmada()
    {
        return $this->estado === self::ESTADO_CONFIRMADA;
    }

    public function setEstadoToConfirmada()
    {
        $this->estado = self::ESTADO_CONFIRMADA;
    }

    /**
     * @return bool
     */
    public function isEstadoCancelada()
    {
        return $this->estado === self::ESTADO_CANCELADA;
    }

    public function setEstadoToCancelada()
    {
        $this->estado = self::ESTADO_CANCELADA;
    }

    /**
     * @return bool
     */
    public function isEstadoUtilizada()
    {
        return $this->estado === self::ESTADO_UTILIZADA;
    }

    public function setEstadoToUtilizada()
    {
        $this->estado = self::ESTADO_UTILIZADA;
    }



    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                // Generar código aleatorio de 8 caracteres
                $this->codigo_confirmacion = strtoupper(Yii::$app->security->generateRandomString(6));
            }
            return true;
        }
        return false;
    }


   
}

