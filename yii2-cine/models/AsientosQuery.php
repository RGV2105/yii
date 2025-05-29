<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Asientos]].
 *
 * @see Asientos
 */
class AsientosQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Asientos[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Asientos|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
