<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%danh_muc_san_pham}}".
 *
 * @property string|null $code_phan_loai
 * @property string $name Tên sản phẩm
 * @property string|null $code
 * @property int $id
 * @property float $gia_ban Giá bán
 * @property string $anh_dai_dien
 */
class DanhMucSanPham extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%danh_muc_san_pham}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id','name'], 'required'],
            [['code_phan_loai'], 'string', 'max' => 60],
            [['gia_ban'], 'number'],
            [['anh_dai_dien'], 'string', 'max' => 100],
            [['ten_san_pham'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'code_phan_loai' => 'Code Phan Loai',
            'ten_san_pham' => 'Tên sản phẩm',
        ];
    }
}
