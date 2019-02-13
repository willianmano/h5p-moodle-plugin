<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * HVP mobile config
 *
 * @package    mod_hvp
 * @category   external
 * @copyright  2019 Willian Mano <willianmanoaraujo@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$addons = array(
    "mod_hvp" => array(
        'handlers' => array(
            'coursehvp' => array(
                'displaydata' => array(
                    'icon' => $CFG->wwwroot . '/mod/hvp/pix/icon.png',
                    'class' => '',
                ),
                'delegate' => 'CoreCourseModuleDelegate',
                'isresource' => true,
                'method' => 'mobile_course_view',
                'offlinefunctions' => array(
                    'mobile_course_view' => array()
                )
            )
        ),
        'lang' => array(
            array('pluginname', 'hvp')
        ),
    )
);