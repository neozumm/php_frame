<?php

declare(strict_types=1);
namespace Framework;

class RegisterConfCommand implements ICommand
{
    private RegisterConfReciever $reciever;
    private string $dir;

    public function __construct(RegisterConfReciever $reciever, string $dir)
    {
        $this->reciever=$reciever;
        $this->dir=$dir;
    }

    public function execute()
    {
        $this->reciever->operation($this->dir);
    }
}
