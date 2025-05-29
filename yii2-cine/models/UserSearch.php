<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\User;

/**
 * UserSearch represents the model behind the search form of `app\models\User`.
 */
class UserSearch extends User
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status'], 'integer'],
            [['nombre', 'apellido', 'username', 'email', 'password_hash', 'auth_key', 'access_token', 'role'], 'safe'],
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
        $query = User::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => 10],
            'sort' => ['defaultOrder' => ['id' => SORT_DESC]],
        ]);

        $this->load($params, $formName);

        // Para pruebas, comentar validación
        // if (!$this->validate()) {
        //     $query->where('0=1');
        //     return $dataProvider;
        // }

        // Comentar filtros para probar que salen datos
        // $query->andFilterWhere([
        //     'id' => $this->id,
        //     'status' => $this->status,
        // ]);

        // $query->andFilterWhere(['like', 'nombre', $this->nombre])
        //     ->andFilterWhere(['like', 'apellido', $this->apellido])
        //     ->andFilterWhere(['like', 'username', $this->username])
        //     ->andFilterWhere(['like', 'email', $this->email])
        //     ->andFilterWhere(['like', 'password_hash', $this->password_hash])
        //     ->andFilterWhere(['like', 'auth_key', $this->auth_key])
        //     ->andFilterWhere(['like', 'access_token', $this->access_token])
        //     ->andFilterWhere(['like', 'role', $this->role]);

        return $dataProvider;
    }


}
