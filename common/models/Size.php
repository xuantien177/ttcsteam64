<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%size}}".
 *
 * @property int $id
 * @property int|null $size
 *
 * @property SizeSanPham[] $sizeSanPhams
 */
class Size extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%size}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['size'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'size' => 'Size',
        ];
    }

    /**
     * Gets query for [[SizeSanPhams]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSizeSanPhams()
    {
        return $this->hasMany(SizeSanPham::className(), ['size_id' => 'id']);
    }
}
