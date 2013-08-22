<?php
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
 * Interface for job providers.
 *
 * Implements the methods, which are required for job providers.
 */
interface Sao_Zed_Library_NativeJobQueue_Job_Provider
{
    /**
     * Returns if the job provider has more jobs.
     *
     * Returns true, if there are more jobs available in the job provider and 
     * false, if the ally have been executed already.
     * 
     * @return bool
     */
    public function hasJobs();

    /**
     * Get next job from job provider
     *
     * Get the next job from the job provider. Should return a valid callback, 
     * which will then be called in the forked child.
     *
     * Returns null, if no job is available anymore.
     * 
     * @return Callback
     */
    public function getNextJob();
}

