<?php
namespace Mwltr\Robo\Deployer;

use Mwltr\Robo\Deployer\Task\DeployerTask;
use Mwltr\Robo\Deployer\Task\DeployTask;

trait loadDeployerTasks
{
    /**
     * @param string $deployerBin
     *
     * @return DeployTask
     */
    protected function taskDeployerDeployTask($deployerBin)
    {
        return $this->task(DeployTask::class, $deployerBin);
    }

    /**
     * @param string $deployerBin
     *
     * @return DeployTask
     */
    protected function taskDeployerTask($deployerBin)
    {
        return $this->task(DeployerTask::class, $deployerBin);
    }

}
