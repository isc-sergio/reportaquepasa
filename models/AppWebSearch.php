<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TipoReporte;

/**
 * AppWebSearch represents the model behind the search.
 *
 * @property string $q
 *
 */
class AppWebSearch extends Model
{
    public $q;
    public $foto;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['q'], 'trim'],
            [['foto'], 'safe']
        ];
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = TipoReporte::find();
        $query->orderBy(['orden' => SORT_ASC, 'nombre' => SORT_ASC]);

        $query->andWhere([
            'activo' => true,
            'publico' => true,
        ]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => false,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        if (strlen($this->q) > 2) {
            $query->andWhere(
                'MATCH(nombre, descripcion, categoria, etiquetas) AGAINST(:q)',
                [':q' => $this->q]
            );
        }

        return $dataProvider;
    }
}
