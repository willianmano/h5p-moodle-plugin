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

namespace mod_hvp\output;

defined('MOODLE_INTERNAL') || die();

use context_module;

/**
 * Mobile output class for certificate
 *
 * @package	mod_hvp
 * @copyright  2019 Willian Mano <willianmanoaraujo@gmail.com>
 * @license	http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class mobile {

    /**
     * Returns the certificate course view for the mobile app.
     * @param  array $args Arguments from tool_mobile_get_content WS
     *
     * @return array    HTML, javascript and otherdat
     * a
     * @throws coding_exception
     * @throws dml_exception
     * @throws moodle_exception
     * @throws require_login_exception
     * @throws required_capability_exception
     */
    public static function mobile_course_view($args) {
        global $OUTPUT, $DB;

        $args = (object) $args;
        $cm = get_coursemodule_from_id('hvp', $args->cmid);
        $course = $DB->get_record('course', ['id' => $args->courseid]);

        // Capabilities check.
        require_login($args->courseid , false , $cm, true, true);

        $context = context_module::instance($cm->id);

        require_capability ('mod/hvp:view', $context);

        $view = new \mod_hvp\view_assets($cm, $course);
        $view->validatecontent();
        $content = $view->getcontent();
        $view->validatecontent();

        $data = [
            'intro' => $content['title'],
            'contentid' => $content['id'],
            'cmid' => $args->cmid
        ];

        return array(
            'templates' => array(
                array(
                    'id' => 'main',
                    'html' => $OUTPUT->render_from_template('mod_hvp/mobile_view_page', $data),
                ),
            ),
            'javascript' => '',
            'otherdata' => '',
            'files' => ''
        );
    }
}
