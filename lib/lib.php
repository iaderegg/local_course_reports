<?php

require_once '../../../config.php';

/**
 * get_best_students
 * @param int $courseid    Course ID
 * @param int $n_students  Number of studentes to return
 * @author Iader E. Garcia G. <iadergg@gmail.com>
 */
function get_best_students($courseid, $n_students) {

    global $DB;

    //$best_students_array = array();

    $sql_query  =   "SELECT users.id, users.username, users.firstname, users.lastname, ggrades.finalgrade
                    FROM 
                        {grade_grades} AS ggrades 
                        INNER JOIN {grade_items} AS gitems ON ggrades.itemid = gitems.id
                        INNER JOIN {course} AS courses ON gitems.courseid = courses.id
                        INNER JOIN {user} AS users ON ggrades.userid = users.id
                    WHERE
                        ggrades.finalgrade 
                        gitems.itemtype = 'course'
                        AND courses.id = $courseid
                        AND users.deleted = 0
                    ORDER BY 
                        ggrades.finalgrade DESC,
                        users.username ASC
                    LIMIT $n_students";

    $best_students_array = $DB->get_records_sql($sql_query);

    return $best_students_array;
}

print_r(get_best_students(32542, 100));