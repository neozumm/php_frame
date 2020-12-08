<?php

declare(strict_types=1);
namespace Framework;

use Symfony\Component\DependencyInjection\ContainerBuilder;

class RegisterConfCommand implements ICommand
{
    private RegisterConfReciever $reciever;
    private string $dir;
    private ContainerBuilder $containerBuilder;

    public function __construct(RegisterConfReciever $reciever, string $dir, ContainerBuilder $containerBuilder)
    {
        $this->reciever=$reciever;
        $this->dir=$dir;
        $this->containerBuilder=$containerBuilder;
    }

    public function execute()
    {
        $this->reciever->operation($this->dir, $this->containerBuilder);
    }
}
