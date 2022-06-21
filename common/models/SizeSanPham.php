<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%size_san_pham}}".
 *
 * @property int $id
 * @property int|null $san_pham_id
 * @property int|null $size_id
 *
 * @property SanPham $sanPham
 * @property Size $size
 */
class SizeSanPham extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%size_san_pham}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['san_pham_id', 'size_id'], 'integer'],
            [['san_pham_id'], 'exist', 'skipOnError' => true, 'targetClass' => SanPham::className(), 'targetAttribute' => ['san_pham_id' => 'id']],
            [['size_id'], 'exist', 'skipOnError' => true, 'targetClass' => Size::className(), 'targetAttribute' => ['size_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'san_pham_id' => 'San Pham ID',
            'size_id' => 'Size ID',
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
     * Gets query for [[Size]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSize()
    {
        return $this->hasOne(Size::className(), ['id' => 'size_id']);
    }
}
