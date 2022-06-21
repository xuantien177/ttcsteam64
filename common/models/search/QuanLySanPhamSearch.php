<?php

namespace common\models\search;

use common\models\API_H17;
use common\models\QuanLySanPham;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TuKhoa;

/**
 * TuKhoaSearch represents the model behind the search form of `common\models\TuKhoa`.
 */
class QuanLySanPhamSearch extends QuanLySanPham
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'ban_chay', 'noi_bat', 'moi_ve', 'thuong_hieu_id', 'nguoi_tao_id', 'nguoi_sua_id', 'so_luong'], 'safe'],
            [['name', 'gia_ban', 'gia_canh_tranh', 'ngay_dang', 'thuong_hieu_id', 'nguoi_tao_id'], 'safe'],
            [['mo_ta_chi_tiet', 'ten_phan_loai'], 'safe'],
            [['gia_ban', 'gia_canh_tranh'], 'safe'],
            [['ngay_dang', 'ngay_sua', 'ngay_hang_ve'], 'safe'],
            [['name', 'code'], 'safe'],
            [['mo_ta_ngan_gon'], 'safe'],
            [['anh_dai_dien'], 'safe'],
            [['ten_thuong_hieu'], 'safe'],
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
        $query = QuanLySanPham::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        #region Query tìm kiếm giá bán
        //select * from sanpham where gia_ban >= {$this->gia_ban_tu}
        if($this->gia_ban_tu!=''){
            $query->andFilterWhere(['>=','gia_ban',$this->gia_ban_tu]);
        }
        //and gia_ban <= {$this->gia_ban}
        if ($this->gia_ban!=''){
            $query->andFilterWhere(['<=','gia_ban',$this->gia_ban]);
        }//đối với giá cạnh tranh làm tương tự, khai báo thuộc tính ảo và lm như trên
        #endregion

        #region Query tìm kiếm ngày đăng
        //Nếu so sánh ngày đăng theo định d/m/Y sẽ ko đúng, nên trc khi so sánh phải convert về Y-m-d
        //d | d/m | d/m/y => Y-m-d : các trường hợp mà người dùng có thể gõ
        if($this->ngay_dang_tu!=''){
            $query->andFilterWhere(['>=','date(ngay_dang)',API_H17::convertDMYtoYMD($this->ngay_dang_tu)]);
        }
        if ($this->ngay_dang!=''){
            $query->andFilterWhere(['<=','date(ngay_dang)',API_H17::convertDMYtoYMD($this->ngay_dang)]);
        }
        #endregion

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'ban_chay' => $this->ban_chay,
            'noi_bat' => $this->noi_bat,
            'moi_ve' => $this->moi_ve,
            //'gia_ban' => $this->gia_ban,
            'gia_canh_tranh' => $this->gia_canh_tranh,
            //'ngay_dang' => $this->ngay_dang,
            'ngay_sua' => $this->ngay_sua,
            'thuong_hieu_id' => $this->thuong_hieu_id,
            'nguoi_tao_id' => $this->nguoi_tao_id,
            'nguoi_sua_id' => $this->nguoi_sua_id,
            'so_luong' => $this->so_luong,
            'ngay_hang_ve' => $this->ngay_hang_ve,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like','ten_phan_loai',$this->ten_phan_loai])
            ->andFilterWhere(['like', 'mo_ta_ngan_gon', $this->mo_ta_ngan_gon])
            ->andFilterWhere(['like', 'mo_ta_chi_tiet', $this->mo_ta_chi_tiet])
            ->andFilterWhere(['like', 'anh_dai_dien', $this->anh_dai_dien]);

        return $dataProvider;
    }
}
