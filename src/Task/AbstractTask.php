<?php
/**
 * @copyright Copyright (c) 2017 Matthias Walter
 *
 * @see LICENSE
 */

namespace Mwltr\Robo\Deployer\Task;

use Robo\Common\ExecOneCommand;
use Robo\Exception\TaskException;
use Robo\Task\BaseTask;

/**
 * AbstractTask
 */
abstract class AbstractTask extends BaseTask
{
    use ExecOneCommand;

    protected $taskInfo = '';

    protected $command;

    protected $action = null;

    protected $ansi = null;

    public function __construct($deployerBin = null)
    {
        $this->command = $deployerBin;

        if (!$this->command) {
            $this->command = $this->findExecutablePhar('deployer');
        }
        if (!$this->command) {
            throw new TaskException(
                __CLASS__, "Neither local deployer.phar nor global composer installation could be found."
            );
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getCommand()
    {
        if (!isset($this->ansi) && $this->getConfig()->isDecorated()) {
            $this->ansi();
        }
        $this->option($this->ansi);

        return "{$this->command} {$this->action}{$this->arguments}";
    }

    /**
     * {@inheritdoc}
     */
    public function run()
    {
        $command = $this->getCommand();

        $this->printTaskInfo("$this->taskInfo : {command}", ['command' => $command]);

        return $this->executeCommand($command);
    }

    public function tag($tag)
    {
        return $this->option("--tag=$tag");
    }

    public function branch($branch)
    {
        return $this->option("--branch=$branch");
    }

    public function stage($stage)
    {
        return $this->arg($stage);
    }

    public function file($file)
    {
        return $this->option("--file=$file");
    }

    public function revision($revision)
    {
        return $this->option("--revision=$revision");
    }

    /**
     * adds `ansi` option to composer
     *
     * @return $this
     */
    public function ansi()
    {
        $this->ansi = '--ansi';

        return $this;
    }

}