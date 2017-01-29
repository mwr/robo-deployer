<?php

namespace Mwltr\Robo\Deployer\Task;

class DeployerTask extends AbstractTask
{
    public function action($action)
    {
        $this->action = $action;
    }

    public function info($info)
    {
        $this->taskInfo = $info;
    }

}