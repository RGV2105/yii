<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "salas".
 *
 * @property int $id_sala
 * @property string $nombre
 * @property int $capacidad
 * @property string $tipo_sala
 * @property int|null $habilitada
 *
 * @property Funciones[] $funciones
 */
class Salas extends \yii\db\ActiveRecord
{

    /**
     * ENUM field values
     */
    const TIPO_SALA_2D = '2D';
    const TIPO_SALA_3D = '3D';
    const TIPO_SALA_4DX = '4DX';
    const TIPO_SALA_VIP = 'VIP';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'salas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
{
    return [
        [['nombre', 'capacidad', 'tipo_sala', 'habilitada'], 'required'],
        [['capacidad'], 'integer'],
        [['habilitada'], 'boolean'],
        [['nombre'], 'string', 'max' => 255],
        [['tipo_sala'], 'in', 'range' => ['2D', '3D', '4DX', 'VIP']],
    ];
}


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_sala' => Yii::t('app', 'Id Sala'),
            'nombre' => Yii::t('app', 'Nombre'),
            'capacidad' => Yii::t('app', 'Capacidad'),
            'tipo_sala' => Yii::t('app', 'Tipo Sala'),
            'habilitada' => Yii::t('app', 'Habilitada'),
        ];
    }

    /**
     * Gets query for [[Funciones]].
     *
     * @return \yii\db\ActiveQuery|FuncionesQuery
     */
    public function getFunciones()
    {
        return $this->hasMany(Funciones::class, ['id_sala' => 'id_sala']);
    }

    /**
     * {@inheritdoc}
     * @return SalasQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SalasQuery(get_called_class());
    }


    /**
     * column tipo_sala ENUM value labels
     * @return string[]
     */
    public static function optsTipoSala()
    {
        return [
            self::TIPO_SALA_2D => Yii::t('app', '2D'),
            self::TIPO_SALA_3D => Yii::t('app', '3D'),
            self::TIPO_SALA_4DX => Yii::t('app', '4DX'),
            self::TIPO_SALA_VIP => Yii::t('app', 'VIP'),
        ];
    }

    /**
     * @return string
     */
    public function displayTipoSala()
    {
        return self::optsTipoSala()[$this->tipo_sala];
    }

    /**
     * @return bool
     */
    public function isTipoSala2d()
    {
        return $this->tipo_sala === self::TIPO_SALA_2D;
    }

    public function setTipoSalaTo2d()
    {
        $this->tipo_sala = self::TIPO_SALA_2D;
    }

    /**
     * @return bool
     */
    public function isTipoSala3d()
    {
        return $this->tipo_sala === self::TIPO_SALA_3D;
    }

    public function setTipoSalaTo3d()
    {
        $this->tipo_sala = self::TIPO_SALA_3D;
    }

    /**
     * @return bool
     */
    public function isTipoSala4dx()
    {
        return $this->tipo_sala === self::TIPO_SALA_4DX;
    }

    public function setTipoSalaTo4dx()
    {
        $this->tipo_sala = self::TIPO_SALA_4DX;
    }

    /**
     * @return bool
     */
    public function isTipoSalaVip()
    {
        return $this->tipo_sala === self::TIPO_SALA_VIP;
    }

    public function setTipoSalaToVip()
    {
        $this->tipo_sala = self::TIPO_SALA_VIP;
    }
}
