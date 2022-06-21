<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%chi_tiet_san_pham}}".
 *
 * @property int $id
 * @property string $name Tên sản phẩm
 * @property string|null $code
 * @property string|null $mo_ta_ngan_gon Tóm tắt
 * @property string|null $mo_ta_chi_tiet Mô tả chi tiết
 * @property int $ban_chay Bán chạy
 * @property int $noi_bat Nổi bật
 * @property int $moi_ve Mới về
 * @property float $gia_ban Giá bán
 * @property float $gia_canh_tranh
 * @property string $anh_dai_dien
 * @property string $ngay_dang
 * @property string|null $ngay_sua
 * @property int $thuong_hieu_id
 * @property int $nguoi_tao_id
 * @property int|null $nguoi_sua_id
 * @property int $so_luong
 * @property string|null $ngay_hang_ve
 * @property int|null $phan_loai_id
 * @property string|null $ten_phan_loai Tên nhóm sản phẩm
 * @property string|null $code_phan_loai
 * @property string|null $code_thuong_hieu
 * @property string|null $ten_thuong_hieu
 */
class ChiTietSanPham extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%chi_tiet_san_pham}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'ban_chay', 'noi_bat', 'moi_ve', 'thuong_hieu_id', 'nguoi_tao_id', 'nguoi_sua_id', 'so_luong'], 'integer'],
            [['name', 'gia_ban', 'gia_canh_tranh', 'ngay_dang', 'thuong_hieu_id', 'nguoi_tao_id'], 'required'],
            [['mo_ta_chi_tiet'], 'string'],
            [['gia_ban', 'gia_canh_tranh'], 'number'],
            [['ngay_dang', 'ngay_sua', 'ngay_hang_ve','phan_loai_id','code_thuong_hieu','ten_thuong_hieu'], 'safe'],
            [['name', 'code'], 'string', 'max' => 150],
            [['mo_ta_ngan_gon'], 'string', 'max' => 500],
            [['anh_dai_dien'], 'string', 'max' => 100],
            [['ten_phan_loai', 'code_phan_loai'], 'string', 'max' => 60],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Tên sản phẩm',
            'code' => 'Code',
            'mo_ta_ngan_gon' => 'Tóm tắt',
            'mo_ta_chi_tiet' => 'Mô tả chi tiết',
            'ban_chay' => 'Bán chạy',
            'noi_bat' => 'Nổi bật',
            'moi_ve' => 'Mới về',
            'gia_ban' => 'Giá bán',
            'gia_canh_tranh' => 'Gia Canh Tranh',
            'anh_dai_dien' => 'Anh Dai Dien',
            'ngay_dang' => 'Ngay Dang',
            'ngay_sua' => 'Ngay Sua',
            'thuong_hieu_id' => 'Thuong Hieu ID',
            'nguoi_tao_id' => 'Nguoi Tao ID',
            'nguoi_sua_id' => 'Nguoi Sua ID',
            'so_luong' => 'So Luong',
            'ngay_hang_ve' => 'Ngay Hang Ve',
            'phan_loai_id'=>'phan_loai_id',
            'ten_phan_loai' => 'Tên nhóm sản phẩm',
            'code_phan_loai' => 'Code Phan Loai',
        ];
    }
}
