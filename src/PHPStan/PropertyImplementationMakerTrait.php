<?php

declare(strict_types = 1);

namespace Finwe\PHPStan;

use PHPStan\Reflection\ClassReflection;
use PHPStan\Reflection\PropertyReflection;

use PHPStan\Type\Type;

trait PropertyImplementationMakerTrait
{

	private function returnPropertyImplementation(Type $type, ClassReflection $declaringClass, bool $static, bool $private, bool $public): PropertyReflection
	{
		return new class($type, $declaringClass, $static, $private, $public) implements PropertyReflection
		{

			/**
			 * @var mixed
			 */
			private $type, $declaringClass, $static, $private, $public;

			public function __construct(Type $type, ClassReflection $declaringClass, bool $static, bool $private, bool $public)
			{
				$this->type = $type;
				$this->declaringClass = $declaringClass;
				$this->static = $static;
				$this->private = $private;
				$this->public = $public;
			}

			public function getDeclaringClass(): ClassReflection
			{
				return $this->declaringClass;
			}

			public function isStatic(): bool
			{
				return $this->static;
			}

			public function isPrivate(): bool
			{
				return $this->private;
			}

			public function isPublic(): bool
			{
				return $this->public;
			}

			public function getType(): Type
			{
				return $this->type;
			}

			public function isReadable(): bool
			{
				return true;
			}

			public function isWritable(): bool
			{
				return true;
			}
		};
	}

}
