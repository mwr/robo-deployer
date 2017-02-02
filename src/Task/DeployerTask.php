<?php
/**
 * @copyright Copyright (c) 2017 Matthias Walter
 *
 * @see LICENSE
 */

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