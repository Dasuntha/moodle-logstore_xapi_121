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

namespace MXTranslator\Tests;

defined('MOODLE_INTERNAL') || die();

use \MXTranslator\Events\EnrolmentCreated as Event;

class enrolment_created_test extends event_test {
    protected static $recipename = 'enrolment_created';

    /**
     * Sets up the tests.
     * @override TestCase
     */
    public function setup() {
        parent::setup();
        $this->event = new Event();
    }

    protected function assert_output($input, $output) {
        parent::assert_output($input, $output);
        $this->assert_user($input['user'], $output, 'instructor');
        $this->assert_user($input['relateduser'], $output, 'user');
        $this->assert_course($input['course'], $output, 'course');
    }
}