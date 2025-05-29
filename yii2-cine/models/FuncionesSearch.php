<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Funciones;

/**
 * FuncionesSearch represents the model behind the search form of `app\models\Funciones`.
 */
class FuncionesSearch extends Funciones
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_funcion', 'id_pelicula', 'id_sala', 'asientos_disponibles'], 'integer'],
            [['fecha_hora'], 'safe'],
            [['precio'], 'number'],
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
        $query = Funciones::find();

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
            'id_funcion' => $this->id_funcion,
            'id_pelicula' => $this->id_pelicula,
            'id_sala' => $this->id_sala,
            'fecha_hora' => $this->fecha_hora,
            'precio' => $this->precio,
            'asientos_disponibles' => $this->asientos_disponibles,
        ]);

        return $dataProvider;
    }
}
