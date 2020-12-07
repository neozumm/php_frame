<?php


declare(strict_types=1);
namespace Framework;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Routing\RouteCollection;

class RegisterRoutesCommand implements ICommand
{
    private RegisterRoutesReciever $reciever;
    /**
         * @var ?RouteCollection|null
         */
    protected $routeCollection;

    /**
     * @var ContainerBuilder
     */
    protected $containerBuilder;
    protected string $dir;

    public function __construct(RegisterRoutesReciever $reciever, ?RouteCollection $routeCollection, ContainerBuilder $containerBuilder, string $dir)
    {
        $this->reciever=$reciever;
        $this->routeCollection=$routeCollection;
        $this->containerBuilder=$containerBuilder;
        $this->dir=$dir;
    }

    public function execute()
    {
        return $this->reciever->operation($this->routeCollection, $this->containerBuilder, $this->dir);
        // return array($this->routeCollection, $this->containerBuilder);
    }
}
