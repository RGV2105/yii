<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Peliculas;

/**
 * PeliculasSearch represents the model behind the search form of `app\models\Peliculas`.
 */
class PeliculasSearch extends Peliculas
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pelicula', 'duracion_min'], 'integer'],
            [['titulo', 'clasificacion', 'genero', 'sinopsis', 'fecha_estreno', 'portada'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     * @param string|null $formName Form name to be used into `->load()` method.
     *
     * @return ActiveDataProvider
     */
    public function search($params, $formName = null)
    {
        $query = Peliculas::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params, $formName);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_pelicula' => $this->id_pelicula,
            'duracion_min' => $this->duracion_min,
            'fecha_estreno' => $this->fecha_estreno,
        ]);

        $query->andFilterWhere(['like', 'titulo', $this->titulo])
            ->andFilterWhere(['like', 'clasificacion', $this->clasificacion])
            ->andFilterWhere(['like', 'genero', $this->genero])
            ->andFilterWhere(['like', 'sinopsis', $this->sinopsis])
            ->andFilterWhere(['like', 'portada', $this->portada]);

        return $dataProvider;
    }
}
