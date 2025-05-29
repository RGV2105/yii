<?php

namespace app\models;

use Yii;
use Yii\web\Uploadedfile;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "peliculas".
 *
 * @property int $id_pelicula
 * @property string $titulo
 * @property int $duracion_min
 * @property string|null $clasificacion
 * @property string|null $genero
 * @property string|null $sinopsis
 * @property string|null $fecha_estreno
 * @property string|null $portada Ruta o URL de la imagen de portada
 *
 * @property Funciones[] $funciones
 */
class Peliculas extends ActiveRecord
{

    public $imageFile;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'peliculas';
    }

    /**
     * {@inheritdoc}
     */
public function rules()
{
    return [
        // Todos los campos requeridos
        [['titulo', 'duracion_min', 'clasificacion', 'genero', 'sinopsis', 'fecha_estreno'], 'required'],
        
        // Validaciones de tipo
        [['duracion_min'], 'integer'],
        [['sinopsis'], 'string'],
        [['fecha_estreno'], 'date', 'format' => 'php:Y-m-d'],  // Validación de fecha
        
        // Longitudes máximas
        [['titulo'], 'string', 'max' => 100],
        [['clasificacion'], 'string', 'max' => 5],
        [['genero'], 'string', 'max' => 50],
        [['portada'], 'string', 'max' => 255],
        
        // Validación de archivo requerido y tipo
        [
            ['imageFile'], 
            'file',
            'skipOnEmpty' => true, // <--- obligatorio
            'extensions' => 'png, jpg, jpeg, gif',
            'mimeTypes' => 'image/*',
        ],
    ];
}


public function upload()
{
    if ($this->imageFile) {
        $path = Yii::getAlias('@webroot/portadas/');
        
        // Crear directorio si no existe
        if (!file_exists($path)) {
            mkdir($path, 0775, true);
        }

        // Generar nombre único
        $filename = uniqid('portada_') . '.' . $this->imageFile->extension;
        
        if ($this->imageFile->saveAs($path . $filename)) {
            // Eliminar imagen anterior si existe
            if ($this->portada && file_exists($path . $this->portada)) {
                unlink($path . $this->portada);
            }
            
            $this->portada = $filename;
            return true;
        }
    }
    return false;
}



public function deletePortada()
{
    if (empty($this->portada)) {
        return false;
    }

    $path = Yii::getAlias('@webroot/portadas/') . $this->portada;
    
    try {
        if (file_exists($path) && is_file($path)) {
            return unlink($path);
        }
        return false;
    } catch (\Exception $e) {
        Yii::error("Error eliminando portada: " . $e->getMessage());
        return false;
    }
}


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pelicula' => Yii::t('app', 'Id Pelicula'),
            'titulo' => Yii::t('app', 'Titulo'),
            'duracion_min' => Yii::t('app', 'Duracion Min'),
            'clasificacion' => Yii::t('app', 'Clasificacion'),
            'genero' => Yii::t('app', 'Genero'),
            'sinopsis' => Yii::t('app', 'Sinopsis'),
            'fecha_estreno' => Yii::t('app', 'Fecha Estreno'),
            'portada' => Yii::t('app', 'Portada'),
        ];
    }

    /**
     * Gets query for [[Funciones]].
     *
     * @return \yii\db\ActiveQuery|FuncionesQuery
     */
    public function getFunciones()
    {
        return $this->hasMany(Funciones::class, ['id_pelicula' => 'id_pelicula']);
    }

    /**
     * {@inheritdoc}
     * @return PeliculasQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PeliculasQuery(get_called_class());
    }


    

}
