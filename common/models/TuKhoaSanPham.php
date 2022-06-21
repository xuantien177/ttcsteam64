<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%tu_khoa_san_pham}}".
 *
 * @property int $id
 * @property int $tu_khoa_id
 * @property int $san_pham_id
 *
 * @property SanPham $sanPham
 * @property TuKhoa $tuKhoa
 */
class TuKhoaSanPham extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%tu_khoa_san_pham}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tu_khoa_id', 'san_pham_id'], 'required'],
            [['tu_khoa_id', 'san_pham_id'], 'integer'],
            [['san_pham_id'], 'exist', 'skipOnError' => true, 'targetClass' => SanPham::className(), 'targetAttribute' => ['san_pham_id' => 'id']],
            [['tu_khoa_id'], 'exist', 'skipOnError' => true, 'targetClass' => TuKhoa::className(), 'targetAttribute' => ['tu_khoa_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tu_khoa_id' => 'Tu Khoa ID',
            'san_pham_id' => 'San Pham ID',
        ];
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

    /**
     * Gets query for [[TuKhoa]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTuKhoa()
    {
        return $this->hasOne(TuKhoa::className(), ['id' => 'tu_khoa_id']);
    }
}
