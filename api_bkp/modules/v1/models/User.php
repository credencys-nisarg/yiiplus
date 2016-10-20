<?php 
 
namespace api\modules\v1\models;
 
use \yii\db\ActiveRecord;
/**
 * User Model
 *
 * @author Budi Irawan <deerawan@gmail.com>
 */
class User extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Users';
    }
 
    /**
     * @inheritdoc
     */
    public static function primaryKey()
    {
        return ['id'];
    }
 
    /**
     * Define rules for validation
     */
    public function rules()
    {
        return [
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
        ];
    }
}