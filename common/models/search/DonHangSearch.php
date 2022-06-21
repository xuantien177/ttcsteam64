<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\DonHang;

/**
 * DonHangSearch represents the model behind the search form of `common\models\DonHang`.
 */
class DonHangSearch extends DonHang
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'tong_so_luong', 'khach_hang_id'], 'integer'],
            [['ngay_dat', 'ho_ten', 'dien_thoai', 'email', 'dia_chi_giao_hang', 'ghi_chu', 'kieu_chiet_khau', 'hinh_thuc_thanh_toan', 'tinh_trang', 'ly_do_huy'], 'safe'],
            [['tong_tien', 'ship', 'vat', 'thanh_tien', 'chiet_khau'], 'number'],
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
        $query = DonHang::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if(\Yii::$app->user->identity->vai_tro == 'Khách hàng'){ //khách hàng chỉ được xem đơn hàng của mình
            $this->khach_hang_id = \Yii::$app->user->id;
        }

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'ngay_dat' => $this->ngay_dat,
            'tong_tien' => $this->tong_tien,
            'ship' => $this->ship,
            'vat' => $this->vat,
            'thanh_tien' => $this->thanh_tien,
            'chiet_khau' => $this->chiet_khau,
            'tong_so_luong' => $this->tong_so_luong,
            'khach_hang_id' => $this->khach_hang_id,
        ]);

        $query->andFilterWhere(['like', 'ho_ten', $this->ho_ten])
            ->andFilterWhere(['like', 'dien_thoai', $this->dien_thoai])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'dia_chi_giao_hang', $this->dia_chi_giao_hang])
            ->andFilterWhere(['like', 'ghi_chu', $this->ghi_chu])
            ->andFilterWhere(['like', 'kieu_chiet_khau', $this->kieu_chiet_khau])
            ->andFilterWhere(['like', 'hinh_thuc_thanh_toan', $this->hinh_thuc_thanh_toan])
            ->andFilterWhere(['like', 'tinh_trang', $this->tinh_trang])
            ->andFilterWhere(['like', 'ly_do_huy', $this->ly_do_huy]);

        return $dataProvider;
    }
}
