<?php
// This file keeps track of upgrades to
// the survey module
//
// Sometimes, changes between versions involve
// alterations to database structures and other
// major things that may break installations.
//
// The upgrade function in this file will attempt
// to perform all the necessary actions to upgrade
// your older installation to the current version.
//
// If there's something it cannot do itself, it
// will tell you what you need to do.
//
// The commands in here will all be database-neutral,
// using the methods of database_manager class
//
// Please do not forget to use upgrade_set_timeout()
// before any action that may take longer time to finish.

defined('MOODLE_INTERNAL') || die();

function xmldb_video_upgrade($oldversion) {
    global $DB;

    $dbman = $DB->get_manager();

    if ($oldversion < 2022060600) {

        // Define field youtubeurl to be added to video.
        $table = new xmldb_table('video');
        $field = new xmldb_field('youtubeurl', XMLDB_TYPE_CHAR, '1000', null, null, null, null, 'type');

        // Conditionally launch add field youtubeurl.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Define field vimeourl to be added to video.
        $table = new xmldb_table('video');
        $field = new xmldb_field('vimeourl', XMLDB_TYPE_CHAR, '1000', null, null, null, null, 'youtubeurl');

        // Conditionally launch add field vimeourl.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Define field externalurl to be added to video.
        $table = new xmldb_table('video');
        $field = new xmldb_field('externalurl', XMLDB_TYPE_CHAR, '1000', null, null, null, null, 'vimeourl');

        // Conditionally launch add field externalurl.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Define field url to be dropped from video.
        $table = new xmldb_table('video');
        $field = new xmldb_field('url');

        // Conditionally launch drop field url.
        if ($dbman->field_exists($table, $field)) {
            $dbman->drop_field($table, $field);
        }

        // Video savepoint reached.
        upgrade_mod_savepoint(true, 2022060600, 'video');
    }

    if ($oldversion < 2022061200) {

        // Define field youtubeid to be added to video.
        $table = new xmldb_table('video');
        $field = new xmldb_field('youtubeid', XMLDB_TYPE_CHAR, '100', null, null, null, null, 'youtubeurl');

        // Conditionally launch add field youtubeid.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Define field vimeoid to be added to video.
        $table = new xmldb_table('video');
        $field = new xmldb_field('vimeoid', XMLDB_TYPE_CHAR, '100', null, null, null, null, 'vimeourl');

        // Conditionally launch add field vimeoid.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Video savepoint reached.
        upgrade_mod_savepoint(true, 2022061200, 'video');
    }

    if ($oldversion < 2022061201) {

        // Define field videoid to be added to video.
        $table = new xmldb_table('video');
        $field = new xmldb_field('videoid', XMLDB_TYPE_CHAR, '100', null, null, null, null, 'type');

        // Conditionally launch add field videoid.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Video savepoint reached.
        upgrade_mod_savepoint(true, 2022061201, 'video');
    }

    if ($oldversion < 2022061600) {

        // Define field debug to be added to video.
        $table = new xmldb_table('video');
        $field = new xmldb_field('debug', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, '0', 'videoid');

        // Conditionally launch add field debug.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Define field controls to be added to video.
        $table = new xmldb_table('video');
        $field = new xmldb_field('controls', XMLDB_TYPE_TEXT, null, null, null, null, null, 'debug');

        // Conditionally launch add field controls.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Define field autoplay to be added to video.
        $table = new xmldb_table('video');
        $field = new xmldb_field('autoplay', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, '0', 'controls');

        // Conditionally launch add field autoplay.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Define field disablecontextmenu to be added to video.
        $table = new xmldb_table('video');
        $field = new xmldb_field('disablecontextmenu', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, '1', 'autoplay');

        // Conditionally launch add field disablecontextmenu.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Define field hidecontrols to be added to video.
        $table = new xmldb_table('video');
        $field = new xmldb_field('hidecontrols', XMLDB_TYPE_INTEGER, '1', null, null, null, '1', 'disablecontextmenu');

        // Conditionally launch add field hidecontrols.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Define field fullscreenenabled to be added to video.
        $table = new xmldb_table('video');
        $field = new xmldb_field('fullscreenenabled', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, '1', 'hidecontrols');

        // Conditionally launch add field fullscreenenabled.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Define field loop to be added to video.
        $table = new xmldb_table('video');
        $field = new xmldb_field('loop', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, '0', 'fullscreenenabled');

        // Conditionally launch add field loop.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Video savepoint reached.
        upgrade_mod_savepoint(true, 2022061600, 'video');
    }

    if ($oldversion < 2022061601) {

        // Rename field loopvideo on table video to NEWNAMEGOESHERE.
        $table = new xmldb_table('video');
        $field = new xmldb_field('loop', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, '0', 'fullscreenenabled');

        // Launch rename field loopvideo.
        $dbman->rename_field($table, $field, 'loopvideo');

        // Video savepoint reached.
        upgrade_mod_savepoint(true, 2022061601, 'video');
    }

    if ($oldversion < 2022061800) {

        // Define field usermodified to be added to video_session.
        $table = new xmldb_table('video_session');
        $field = new xmldb_field('usermodified', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, '0', 'timecreated');

        // Conditionally launch add field usermodified.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Define field timemodified to be added to video_session.
        $table = new xmldb_table('video_session');
        $field = new xmldb_field('timemodified', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, '0', 'usermodified');

        // Conditionally launch add field timemodified.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Video savepoint reached.
        upgrade_mod_savepoint(true, 2022061800, 'video');
    }

    if ($oldversion < 2022061900) {

        // Define field preventfowardseeking to be added to video.
        $table = new xmldb_table('video');
        $field = new xmldb_field('preventfowardseeking', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, '0', 'loopvideo');

        // Conditionally launch add field preventfowardseeking.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Video savepoint reached.
        upgrade_mod_savepoint(true, 2022061900, 'video');
    }

    if ($oldversion < 2022062000) {

        // Rename field preventfowardseeking on table video to NEWNAMEGOESHERE.
        $table = new xmldb_table('video');
        $field = new xmldb_field('preventfowardseeking', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, '0', 'loopvideo');

        // Launch rename field preventfowardseeking.
        $dbman->rename_field($table, $field, 'preventforwardseeking');

        // Video savepoint reached.
        upgrade_mod_savepoint(true, 2022062000, 'video');
    }

    if ($oldversion < 2022072900) {

        // Define field completiononplay to be added to video.
        $table = new xmldb_table('video');
        $field = new xmldb_field('completiononplay', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, '0', 'preventforwardseeking');

        // Conditionally launch add field completiononplay.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Define field completiononpercent to be added to video.
        $table = new xmldb_table('video');
        $field = new xmldb_field('completiononpercent', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, '0', 'completiononplay');

        // Conditionally launch add field completiononpercent.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Define field completionpercent to be added to video.
        $table = new xmldb_table('video');
        $field = new xmldb_field('completionpercent', XMLDB_TYPE_INTEGER, '3', null, XMLDB_NOTNULL, null, '100', 'completiononpercent');

        // Conditionally launch add field completionpercent.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Define field completiononviewtime to be added to video.
        $table = new xmldb_table('video');
        $field = new xmldb_field('completiononviewtime', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, '0', 'completionpercent');

        // Conditionally launch add field completiononviewtime.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Define field completionviewtime to be added to video.
        $table = new xmldb_table('video');
        $field = new xmldb_field('completionviewtime', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, '0', 'completiononviewtime');

        // Conditionally launch add field completionviewtime.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Video savepoint reached.
        upgrade_mod_savepoint(true, 2022072900, 'video');
    }

    if ($oldversion < 2023101701) {
        // Define field resume to be added to video.
        $table = new xmldb_table('video');
        $field = new xmldb_field('resume', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, '0', 'completionviewtime');

        // Conditionally launch add field loop.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Video savepoint reached.
        upgrade_mod_savepoint(true, 2023101701, 'video');
    }

    if ($oldversion < 2023101702) {
        // Define field resume to be added to video.
        $table = new xmldb_table('video');
        $field = new xmldb_field('resume', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, '1', 'completionviewtime');

        $dbman->change_field_default($table, $field);

        // Video savepoint reached.
        upgrade_mod_savepoint(true, 2023101702, 'video');
    }

    return true;
}
