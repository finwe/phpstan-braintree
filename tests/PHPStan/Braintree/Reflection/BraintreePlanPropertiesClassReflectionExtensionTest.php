<?php

declare(strict_types = 1);

namespace Finwe\PHPStan\Braintree\Reflection;

use Braintree\Plan;

class BraintreePlanPropertiesClassReflectionExtensionTest extends \PHPUnit\Framework\TestCase
{

	use ReflectionMockingTrait;

	/** @var \Finwe\PHPStan\Braintree\Reflection\BraintreePlanPropertiesClassReflectionExtension */
	private $extension;

	protected function setUp()
	{
		parent::setUp();

		$this->extension = new BraintreePlanPropertiesClassReflectionExtension();
	}

	/**
	 * @return mixed[]
	 */
	public function dataHasProperty(): array
	{
		$data = [];

		$data[] = [
			Plan::class,
			'foo',
			false,
		];

		$data[] = [
			Plan::class,
			'billingDayOfMonth',
			true,
		];

		return $data;
	}

	/**
	 * @dataProvider dataHasProperty
	 *
	 * @param string $className
	 * @param string $property
	 * @param bool $result
	 *
	 * @return void
	 */
	public function testHasProperty(string $className, string $property, bool $result)
	{
		$classReflection = $this->mockClassReflection(new \ReflectionClass($className));
		$this->assertSame($result, $this->extension->hasProperty($classReflection, $property));
	}

}
