<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Reservas;

/**
 * ReservasSearch represents the model behind the search form of `app\models\Reservas`.
 */
class ReservasSearch extends Reservas
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_reserva', 'id_cliente', 'id_funcion', 'cantidad_asientos'], 'integer'],
            [['fecha_reserva', 'estado', 'codigo_confirmacion'], 'safe'],
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
        $query = Reservas::find();

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
            'id_reserva' => $this->id_reserva,
            'id_cliente' => $this->id_cliente,
            'id_funcion' => $this->id_funcion,
            'fecha_reserva' => $this->fecha_reserva,
            'cantidad_asientos' => $this->cantidad_asientos,
        ]);

        $query->andFilterWhere(['like', 'estado', $this->estado])
            ->andFilterWhere(['like', 'codigo_confirmacion', $this->codigo_confirmacion]);

        return $dataProvider;
    }
}
