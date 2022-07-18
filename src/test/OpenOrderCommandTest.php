<?php

declare(strict_types=1);

use Binance\ApiConst;
use Binance\Command\BuyOpenOrderCommand;
use Binance\ValueObject\FloatVO;
use Binance\ValueObject\OrderSide;
use Binance\ValueObject\OrderType;
use Binance\ValueObject\Text;
use PHPUnit\Framework\TestCase;

final class OpenOrderCommandTest extends TestCase
{
    public function testBuyMarketSuccessValidation(): void
    {
        $cmd = (new BuyOpenOrderCommand())
            ->setSymbol(new Text('phpunit'))
            ->setQuantity(new FloatVO(100))
            ->setSide(new OrderSide(ApiConst::ORDER_SIDE_BUY))
            ->setType(new OrderType(ApiConst::ORDER_TYPE_MARKET));

        $this->assertTrue($cmd->isValid());
    }

    public function testBuyMarketFailedValidation(): void
    {
        $cmd = (new BuyOpenOrderCommand())
            ->setSymbol(new Text('phpunit'))
            ->setSide(new OrderSide(ApiConst::ORDER_SIDE_BUY))
            ->setType(new OrderType(ApiConst::ORDER_TYPE_MARKET));

        $this->assertFalse($cmd->isValid());
    }
}
