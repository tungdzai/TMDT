<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class DefineOrder extends Enum
{
    const NO_CONFIRM = ['name' => '0', 'mess' => 'Đơn xin đã được lưu.', 'text' => 'Chờ gửi', 'color' => 'gray'];
    const CONFIRM = ['name' => '1', 'mess' => 'Đơn xin đã được gửi đi.', 'text' => 'Chờ được duyệt', 'color' => 'orange'];
    const VN_PAY = ['name' => '0', 'mess' => 'Đơn xin đã được duyệt.', 'text' => 'Đã duyệt', 'color' => 'green'];
    const BUY = ['name' => '1', 'mess' => 'Đơn xin đã từ chối.', 'text' => 'Từ chối', 'color' => 'red'];

    private static $index = [
        '0' => self::NO_SEND,
        '1' => self::SENDED,
        '2' => self::CONFIRM,
        '3' => self::DENY
    ];

    public function name(): string
    {
        return $this->value['name'];
    }

    public function mess(): string
    {
        return $this->value['mess'];
    }

    public function text(): string
    {
        return $this->value['text'];
    }

    public function color(): string
    {
        return $this->value['color'];
    }

    public function status(): string
    {
        return $this->value['status'];
    }

    public static function getIndex(): array
    {
        return self::$index;
    }

    public static function getByName(string $name): self
    {
        if (!isset(self::$index[$name])) {
            throw new \UnexpectedValueException("Invalid name: $name");
        }
        return new self(self::$index[$name]);
    }
}
