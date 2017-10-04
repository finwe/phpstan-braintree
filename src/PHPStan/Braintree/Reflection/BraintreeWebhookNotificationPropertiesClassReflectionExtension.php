<?php

declare(strict_types = 1);

namespace Finwe\PHPStan\Braintree\Reflection;

use Braintree\Subscription;
use Braintree\WebhookNotification;

use DateTime;

use Finwe\PHPStan\PropertyImplementationMakerTrait;

use PHPStan\Reflection\ClassReflection;
use PHPStan\Reflection\PropertiesClassReflectionExtension;
use PHPStan\Reflection\PropertyReflection;

use PHPStan\Type\ArrayType;
use PHPStan\Type\ObjectType;
use PHPStan\Type\StringType;

class BraintreeWebhookNotificationPropertiesClassReflectionExtension implements PropertiesClassReflectionExtension
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

		];
	}

	public function hasProperty(ClassReflection $classReflection, string $propertyName): bool
	{
		return $classReflection->getName() === WebhookNotification::class
			&& \array_key_exists($propertyName, $this->properties);
	}

	public function getProperty(ClassReflection $classReflection, string $propertyName): PropertyReflection
	{
		$key = $this->properties[$propertyName];
		return $this->returnPropertyImplementation($key[0], $classReflection, $key[1], $key[2], $key[3]);
	}

}
