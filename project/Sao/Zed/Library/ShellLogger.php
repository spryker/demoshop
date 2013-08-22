<?php
/**
 * @author Marco Roßdeutscher <marco.rossdeutscher@project-a.com>
 * @version $Id$
 *
 * forked version of native job queue`s shell logger
 * based on https://github.com/kore/njq/blob/master/src/logger/shell.php
 *
 * see original license and stuff below
 */
/**
 * Native PHP job queue
 *
 * This file is part of njq.
 *
 * njq is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Lesser General Public License as published by the Free
 * Software Foundation; version 3 of the License.
 *
 * njq is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Lesser General Public License for
 * more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with njq; if not, write to the Free Software Foundation, Inc., 51
 * Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @package VCSWrapper
 * @subpackage Core
 * @version $Revision: 954 $
 * @license http://www.gnu.org/licenses/lgpl-3.0.txt LGPLv3
 */

/*
 * CLI logger
 *
 * Prints the current executor status to STDERR. If the job provider implements
 * Countable also a progress bar is printed.
 */
class Sao_Zed_Library_ShellLogger
{
    /**
     * Number of jobs to execute
     *
     * @var int
     */
    protected $count;

    /**
     * Stream to write to
     *
     * @var resource
     */
    protected $stream;

    /**
     * Print ETA
     *
     * @var bool
     */
    protected $printEta;

    /**
     * Starting time of the executor
     *
     * @var float
     */
    protected $started;

    /**
     * Visual process indicators
     *
     * @var array
     */
    protected $processIndicators = array( '|', '/', '-', '\\' );

    /**
     * Construct from output stream to write to
     * Defaults to STDERR.
     *
     * @param resource $output
     * @param bool $printEta
     */
    public function __construct( $output = STDERR, $printEta = false )
    {
        $this->stream   = $output;
        $this->printEta = (bool) $printEta;
    }

    /**
     * Method called, when the executor run is started
     *
     * @param null $container
     * @return void
     */
    public function startExecutor($container = null)
    {
        if ($container && $container instanceof \Countable) {
            $this->count = count($container);
        }
        $this->started = microtime( true );
    }

    /**
     * Method called, when all jobs are executed
     *
     * @return void
     */
    public function finishedExecutor()
    {
        fwrite( $this->stream, "\n" );
    }

    /**
     * Method called, when all jobs are executed
     * @param $nr
     */
    public function progressJob($nr)
    {
        if ($this->count) {
            \fwrite( $this->stream, \sprintf( "   \r% 4d / %d (% 2.2F%%) %s %s  ",
                    $nr,
                    $this->count,
                    $nr / $this->count * 100,
                    $this->processIndicators[$nr % count( $this->processIndicators )],
                    ( !$this->printEta ? '' : $this->getEta( $nr ) )
                ) );
        } else {
            \fwrite( $this->stream, \sprintf( "   \r% 4d %s   ",
                    $nr,
                    $this->processIndicators[$nr % count( $this->processIndicators )]
                ) );
        }
    }

    /**
     * Return nicely formatted ETA
     *
     * @param int $nr
     * @return string
     */
    protected function getEta($nr)
    {
        $timePassed       = microtime( true ) - $this->started;
        $percentCompleted = $nr / $this->count;
        $secondsRequired  = $timePassed / $percentCompleted * ( 1 - $percentCompleted );

        return sprintf( 'ETA: % 2d.%02dm',
            floor( $secondsRequired / 60 ),
            $secondsRequired % 60
        );
    }
}
