<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "attachments".
 *
 * @property integer $colorid
 * @property integer $attachment_id
 * @property integer $model_id
 * @property integer $created_at
 * @property integer $updated_at
 */
class AttachmentColors extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'attachment_colors';
    }

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'color_code','color_percentage'], 'safe'],
            [['id', 'attachment_id', 'created_at', 'updated_at'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'attachment_id' => Yii::t('app', 'User ID'),
            'color_code' => Yii::t('app', 'Model ID'),
            'color_percentage' => Yii::t('app', 'Model ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    public function getAttachments() {
        return $this->hasOne(Attachments::className(), ['id' => 'attachment_id']);
    }

}
