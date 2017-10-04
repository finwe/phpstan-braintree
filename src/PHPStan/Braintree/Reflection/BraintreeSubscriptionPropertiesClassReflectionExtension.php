<?php

declare(strict_types = 1);

namespace Finwe\PHPStan\Braintree\Reflection;

use Braintree\AddOn;
use Braintree\Discount;
use Braintree\Subscription;
use Braintree\Transaction;

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

class BraintreeSubscriptionPropertiesClassReflectionExtension implements PropertiesClassReflectionExtension
{

	use PropertyImplementationMakerTrait;

	/**
	 * @var mixed[]
	 */
	private $properties;

	public function __construct()
	{
		$this->properties = [

			'timestamp' => [new ObjectType(DateTime::class), false, false, true],
			'kind' => [new StringType(), false, false, true],
			'subject' => [new ArrayType(new StringType()), false, false, true],
			'subscription' => [new ObjectType(Subscription::class), false, false, true],
			'addOns' => [new ArrayType(new ObjectType(AddOn::class)), false, false, true],
			'balance' => [new StringType(), false, false, true],
			'billingDayOfMonth' => [new IntegerType(), false, false, true],
			'billingPeriodEndDate' => [new StringType(), false, false, true],
			'billingPeriodStartDate' => [new StringType(), false, false, true],
			'createdAt' => [new ObjectType(DateTime::class), false, false, true],
			'currentBillingCycle' => [new IntegerType(), false, false, true],
			'daysPastDue' => [new IntegerType(), false, false, true],
			'description' => [new StringType(), false, false, true],
			'descriptor' => [new StringType(), false, false, true],
			'name' => [new StringType(), false, false, true],
			'phone' => [new StringType(), false, false, true],
			'url' => [new StringType(), false, false, true],
			'discounts' => [new ArrayType(new ObjectType(Discount::class)), false, false, true],
			'failureCount' => [new IntegerType(), false, false, true],
			'firstBillingDate' => [new StringType(), false, false, true],
			'id' => [new StringType(), false, false, true],
			'merchantAccountId' => [new StringType(), false, false, true],
			'neverExpires' => [new TrueOrFalseBooleanType(), false, false, true],
			'nextBillAmount' => [new StringType(), false, false, true],
			'nextBillingDate' => [new StringType(), false, false, true],
			'nextBillingPeriodAmount' => [new StringType(), false, false, true],
			'numberOfBillingCycles' => [new IntegerType(), false, false, true],
			'paidThroughDate' => [new StringType(), false, false, true],
			'paymentMethodToken' => [new StringType(), false, false, true],
			'planId' => [new StringType(), false, false, true],
			'price' => [new StringType(), false, false, true],
			'status' => [new StringType(), false, false, true],
			'statusHistory' => [new ArrayType(new StringType()), false, false, true],
			'transactions' => [new ArrayType(new ObjectType(Transaction::class)), false, false, true],
			'trialDuration' => [new IntegerType(), false, false, true],
			'trialDurationUnit' => [new StringType(), false, false, true],
			'trialPeriod' => [new TrueOrFalseBooleanType(), false, false, true],
			'updatedAt' => [new ObjectType(DateTime::class), false, false, true],

		];
	}

	public function hasProperty(ClassReflection $classReflection, string $propertyName): bool
	{
		return $classReflection->getName() === Subscription::class
			&& \array_key_exists($propertyName, $this->properties);
	}

	public function getProperty(ClassReflection $classReflection, string $propertyName): PropertyReflection
	{
		$key = $this->properties[$propertyName];
		return $this->returnPropertyImplementation($key[0], $classReflection, $key[1], $key[2], $key[3]);
	}

}
