<?php

namespace Finwe\PHPStan\Braintree\Reflection;

use PHPStan\Reflection\ClassReflection;
use PHPStan\Reflection\MethodReflection;
use PHPStan\Reflection\PropertyReflection;

trait ReflectionMockingTrait
{

	private function mockClassReflection(\ReflectionClass $class): ClassReflection
	{
		$classReflection = $this->createMock(ClassReflection::class);
		$classReflection->method('getNativeReflection')->will($this->returnValue($class));
		$classReflection->method('getName')->will($this->returnValue($class->getName()));
		$classReflection->method('hasProperty')->will(
			$this->returnCallback(
				function (string $property) use ($class): bool {
					return $class->hasProperty($property);
				}
			)
		);
		$classReflection->method('getProperty')->will(
			$this->returnCallback(
				function (string $property) use ($class): PropertyReflection {
					return $this->mockPropertyReflection($class->getProperty($property));
				}
			)
		);
		$classReflection->method('hasMethod')->will(
			$this->returnCallback(
				function (string $method) use ($class): bool {
					return $class->hasMethod($method);
				}
			)
		);
		$classReflection->method('getMethod')->will(
			$this->returnCallback(
				function (string $method) use ($class): MethodReflection {
					return $this->mockMethodReflection($class->getMethod($method));
				}
			)
		);

		return $classReflection;
	}

	private function mockMethodReflection(\ReflectionMethod $method): MethodReflection
	{
		$methodReflection = $this->createMock(MethodReflection::class);
		$methodReflection->method('isPublic')->will($this->returnValue($method->isPublic()));
		$methodReflection->method('isStatic')->will($this->returnValue($method->isStatic()));

		return $methodReflection;
	}

	private function mockPropertyReflection(\ReflectionProperty $property): PropertyReflection
	{
		$propertyReflection = $this->createMock(PropertyReflection::class);
		$propertyReflection->method('isPublic')->will($this->returnValue($property->isPublic()));

		return $propertyReflection;
	}

}
