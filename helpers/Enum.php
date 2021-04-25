<?php
namespace app\helpers;

use Countable;
use Iterator;
use ReflectionClass;
use ReflectionException;
use Yii;
use yii\base\InvalidValueException;
use yii\helpers\ArrayHelper;
use yii\helpers\Inflector;

/**
 * Class Enum
 * @package app\helpers
 */
abstract class Enum implements Iterator, Countable {

    protected static $cache = [];
    private $position = 0;

    public function __construct() {
        $this->position = 0;
    }

    protected static function getTranslatedLabel($label) {
        return Yii::t('app', $label);
    }

    /**
     * @return array
     * @throws ReflectionException
     */
    static function getKeys() {
        return array_keys(static::getConstants());
    }

    /**
     * @return array
     * @throws ReflectionException
     */
    static function getValues() {
        return array_values(static::getConstants());
    }

    /**
     * @param $constant
     *
     * @return bool
     * @throws ReflectionException
     */
    static function isValid($constant) {
        return in_array($constant, static::getValues());
    }

    /**
     * @param $constant
     * @param string $exceptionMessage
     * @throws ReflectionException
     */
    static function isValidOrFail($constant, $exceptionMessage = 'is not valid.') {
        if (!static::isValid($constant)) {
            throw new InvalidValueException(static::class . " : '$constant' $exceptionMessage");
        }
    }

    /**
     * @return array
     * @throws ReflectionException
     */
    static function getConstants() {
        if (!array_key_exists(static::class, static::$cache)) {
            $class = new ReflectionClass(get_called_class());
            static::$cache[static::class] = $class->getConstants();
        }

        return static::$cache[static::class];
    }

    static function getLabels() {
        $keys = [];
        foreach (static::getConstants() as $key => $value) {
            $keys[$value] = static::getTranslatedLabel(Inflector::camel2words($value));
        }

        return ArrayHelper::merge($keys, static::labels());
    }

    static function getLabel($constant) {
        return static::getLabels()[$constant]??null;
    }

    static function getLabelsWithValue($isLabelValue = true) {

        $labelsWithValue = [];

        foreach (static::getConstants() as $key => $value) {
            /**
             * if there is a DEFAULT = something constant
             * and it is overridden in child class to DEFAULT = null, it has to be removed.
             *
             * @see HasFileTypes
             */
            if (!$value) continue;

            $labelKey = static::getLabel($value);
            $labelsWithValue[!$isLabelValue ? $labelKey : $value] = $isLabelValue ? $labelKey : $value;
        }

        return $labelsWithValue;
    }

    protected static function labels() {
        return [];
    }

    /**
     * @inheritdoc
     */
    public function current(){
        return self::getValues()[$this->position];
    }

    /**
     * @inheritdoc
     */
    public function next(){
        ++$this->position;
    }

    /**
     * @inheritdoc
     */
    public function key(){
        return self::getKeys()[$this->position];
    }

    /**
     * @inheritdoc
     */
    public function valid(){
        return isset(self::getKeys()[$this->position]);
    }

    /**
     * @inheritdoc
     */
    public function rewind(){
        $this->position = 0;
    }

    /**
     * @return static
     */
    public static function getIterator() {
        return new static();
    }

    /**
     * @inheritdoc
     */
    public function toArray(array $fields = [], array $expand = [], $recursive = true) {
        return self::getConstants();
    }

    /**
     * @inheritdoc
     */
    public function count() {
        return count(self::getConstants());
    }
}