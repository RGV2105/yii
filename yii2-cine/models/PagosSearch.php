<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pagos;

/**
 * PagosSearch represents the model behind the search form of `app\models\Pagos`.
 */
class PagosSearch extends Pagos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pago', 'id_reserva'], 'integer'],
            [['monto'], 'number'],
            [['metodo_pago', 'fecha_pago', 'estado', 'transaccion_id'], 'safe'],
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
        $query = Pagos::find();

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
            'id_pago' => $this->id_pago,
            'id_reserva' => $this->id_reserva,
            'monto' => $this->monto,
            'fecha_pago' => $this->fecha_pago,
        ]);

        $query->andFilterWhere(['like', 'metodo_pago', $this->metodo_pago])
            ->andFilterWhere(['like', 'estado', $this->estado])
            ->andFilterWhere(['like', 'transaccion_id', $this->transaccion_id]);

        return $dataProvider;
    }
}
