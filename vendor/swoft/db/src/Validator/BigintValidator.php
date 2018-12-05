<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  group@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */
namespace Swoft\Db\Validator;

use Swoft\Bean\Annotation\Bean;
use Swoft\Exception\ValidatorException;

/**
 * @Bean("DbBigintValidator")
 */
class BigintValidator implements ValidatorInterface
{
    /**
     * @param string $column    Colunm name
     * @param mixed  $value     Column value
     * @param array  ...$params Other parameters
     * @throws ValidatorException When validation failures, will throw an Exception
     * @return bool When validation successful
     */
    public function validate(string $column, $value, ...$params): bool
    {
        $min = '-9223372036854775808';
        $max = '18446744073709551615';

        if (!preg_match("/^-?[0-9]+$/", $value)) {
            throw new ValidatorException("数据库字段值验证失败，当前值 {$value} 不为有效整数，column={$column}");
        }

        if (bccomp($value, $min) === -1) {
            throw new ValidatorException("数据库字段值验证失败，当前值小于{$min}，column={$column}");
        }

        if(bccomp($value, $max) === 1){
            throw new ValidatorException("数据库字段值验证失败，当前值大于{$max}，column={$column}");
        }

        return true;
    }
}
