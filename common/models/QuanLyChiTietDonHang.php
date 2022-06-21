<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%quan_ly_chi_tiet_don_hang}}".
 *
 * @property int $id
 * @property int $don_hang_id
 * @property int $san_pham_id
 * @property int $so_luong
 * @property float $don_gia
 * @property float|null $gia_nhap
 * @property int|null $chiet_khau
 * @property string|null $kieu_chiet_khau
 * @property float|null $thanh_tien
 * @property float|null $tong_tien
 * @property int|null $ton_kho
 * @property string|null $type
 * @property string|null $ngay_dat
 * @property string|null $name Tên sản phẩm
 * @property float|null $gia_ban Giá bán
 * @property string|null $anh_dai_dien
 * @property int|null $so_luong_san_pham
 */
class QuanLyChiTietDonHang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%quan_ly_chi_tiet_don_hang}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'don_hang_id', 'san_pham_id', 'so_luong', 'chiet_khau', 'ton_kho', 'so_luong_san_pham'], 'integer'],
            [['don_hang_id', 'san_pham_id', 'so_luong', 'don_gia'], 'required'],
            [['don_gia', 'gia_nhap', 'thanh_tien', 'tong_tien', 'gia_ban'], 'number'],
            [['kieu_chiet_khau', 'type'], 'string'],
            [['ngay_dat','anh_dai_dien'], 'safe'],
            [['name'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'don_hang_id' => 'Don Hang ID',
            'san_pham_id' => 'San Pham ID',
            'so_luong' => 'So Luong',
            'don_gia' => 'Don Gia',
            'gia_nhap' => 'Gia Nhap',
            'chiet_khau' => 'Chiet Khau',
            'kieu_chiet_khau' => 'Kieu Chiet Khau',
            'thanh_tien' => 'Thanh Tien',
            'tong_tien' => 'Tong Tien',
            'ton_kho' => 'Ton Kho',
            'type' => 'Type',
            'ngay_dat' => 'Ngay Dat',
            'name' => 'Tên sản phẩm',
            'gia_ban' => 'Giá bán',
            'so_luong_san_pham' => 'So Luong San Pham',
        ];
    }
}
