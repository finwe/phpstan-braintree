<?php

declare(strict_types = 1);

namespace Finwe\PHPStan\Braintree\Reflection;

use Braintree\AddOn;
use Braintree\Discount;
use Braintree\Plan;

use DateTime;

use Finwe\PHPStan\PropertyImplementationMakerTrait;

use PHPStan\Reflection\ClassReflection;
use PHPStan\Reflection\PropertiesClassReflectionExtension;
use PHPStan\Reflection\PropertyReflection;

use PHPStan\Type\ArrayType;
use PHPStan\Type\IntegerType;
use PHPStan\Type\ObjectType;
use PHPStan\Type\StringType;
use PHPStan\Type\TrueOrFalseBooleanType;

class BraintreePlanPropertiesClassReflectionExtension implements PropertiesClassReflectionExtension
{

	use PropertyImplementationMakerTrait;

	/**
	 * @var mixed[]
	 */
	private $properties;

	public function __construct()
	{
		$this->properties = [

			'id' => [new StringType(), false, false, true],
			'merchantId' => [new StringType(), false, false, true],

			'description' => [new StringType(), false, false, true],
			'name' => [new StringType(), false, false, true],

			'billingDayOfMonth' => [new IntegerType(), false, false, true],
			'billingFrequency' => [new IntegerType(), false, false, true],

			'numberOfBillingCycles' => [new IntegerType(), false, false, true],

			'price' => [new StringType(), false, false, true],
			'currencyIsoCode' => [new StringType(), false, false, true],

			'trialDuration' => [new IntegerType(), false, false, true],
			'trialDurationUnit' => [new StringType(), false, false, true],
			'trialPeriod' => [new TrueOrFalseBooleanType(), false, false, true],

			'createdAt' => [new ObjectType(DateTime::class), false, false, true],
			'updatedAt' => [new ObjectType(DateTime::class), false, false, true],

			'addOns' => [new ArrayType(new ObjectType(AddOn::class)), false, false, true],
			'discounts' => [new ArrayType(new ObjectType(Discount::class)), false, false, true],
			'plans' => [new ArrayType(new ObjectType(Plan::class)), false, false, true],

		];
	}

	public function hasProperty(ClassReflection $classReflection, string $propertyName): bool
	{
		return $classReflection->getName() === Plan::class
			&& \array_key_exists($propertyName, $this->properties);
	}

	public function getProperty(ClassReflection $classReflection, string $propertyName): PropertyReflection
	{
		$key = $this->properties[$propertyName];
		return $this->returnPropertyImplementation($key[0], $classReflection, $key[1], $key[2], $key[3]);
	}

}
