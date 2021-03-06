<?php

namespace Tests\Becklyn\GluggiBundle\Data;

use Becklyn\GluggiBundle\Data\Component;
use Becklyn\GluggiBundle\Data\ComponentType;
use PHPUnit\Framework\TestCase;


class ComponentTest extends TestCase
{
    private function getInstance (string $fileName)
    {
        $type = self::getMockBuilder(ComponentType::class)
            ->disableOriginalConstructor()
            ->getMock();

        $type
            ->method("getDirectory")
            ->willReturn("atom");

        return new Component(new \SplFileInfo(__DIR__ . "/../templates/atom/{$fileName}"), '', $type);
    }



    public function testBasicData ()
    {
        $component = $this->getInstance("_hidden.html.twig");
        self::assertSame("_hidden", $component->getKey());
        self::assertSame("Hidden", $component->getName());
        self::assertTrue($component->isHidden());
    }
}
