<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TipoReporte;

/**
 * TipoReporteSearch represents the model behind the search form of `app\models\TipoReporte`.
 */
class TipoReporteSearch extends TipoReporte
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'activo', 'publico', 'orden', 'unidad_responsable_reporte_id'], 'integer'],
            [['nombre', 'categoria', 'etiquetas'], 'safe'],
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
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = TipoReporte::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'attributes' => ['nombre', 'orden'],
                'defaultOrder' => ['orden' => SORT_ASC],
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'activo' => $this->activo,
            'publico' => $this->publico,
            'orden' => $this->orden,
            'unidad_responsable_reporte_id' => $this->unidad_responsable_reporte_id,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'categoria', $this->categoria])
            ->andFilterWhere(['like', 'etiquetas', $this->etiquetas]);

        return $dataProvider;
    }
}
