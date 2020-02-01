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
 * The Custom Report setup page.
 *
 * @package   local_iracv
 * @copyright  2019 Iader E. Garcia G. <iaderegg@gmail.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once '../../../config.php';

require_once($CFG->libdir.'/adminlib.php');

require_login();

$url = new moodle_url('/local/iracv/index.php');


$usercontext = context_user::instance($USER->id);
$PAGE->set_context(context_system::instance());

$PAGE->set_url($url);
$PAGE->set_title("IRACV");
$PAGE->set_heading("Inscripción de Cursos en el Campus Virtual");

//require_capability('moodle/grade:manage', $context);

$PAGE->requires->css('/local/iracv/styles/index.css', true);

$PAGE->requires->js_call_amd('local_iracv/menu', 'init');

echo $OUTPUT->header();

$data = new stdClass();

echo $OUTPUT->render_from_template('local_iracv/dashboard_base', $data);

echo $OUTPUT->footer();

die;