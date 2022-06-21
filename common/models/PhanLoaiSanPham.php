<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%phan_loai_san_pham}}".
 *
 * @property int $id
 * @property int $phan_loai_id
 * @property int $san_pham_id
 *
 * @property PhanLoai $phanLoai
 * @property SanPham $sanPham
 */
class PhanLoaiSanPham extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%phan_loai_san_pham}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['phan_loai_id', 'san_pham_id'], 'required'],
            [['phan_loai_id', 'san_pham_id'], 'integer'],
            [['phan_loai_id'], 'exist', 'skipOnError' => true, 'targetClass' => PhanLoai::className(), 'targetAttribute' => ['phan_loai_id' => 'id']],
            [['san_pham_id'], 'exist', 'skipOnError' => true, 'targetClass' => SanPham::className(), 'targetAttribute' => ['san_pham_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'phan_loai_id' => 'Phan Loai ID',
            'san_pham_id' => 'San Pham ID',
        ];
    }

    /**
     * Gets query for [[PhanLoai]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPhanLoai()
    {
        return $this->hasOne(PhanLoai::className(), ['id' => 'phan_loai_id']);
    }

    /**
     * Gets query for [[SanPham]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSanPham()
    {
        return $this->hasOne(SanPham::className(), ['id' => 'san_pham_id']);
    }
}
