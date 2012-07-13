<?php

define('CACHE_DIR', realpath(dirname(__FILE__) . '/..').'/cache/');
error_reporting(E_ALL);
ini_set('display_errors', 'On');

class Plan {

    public function getMeals() {
        if (!isset($_GET['id'])) {
            header('Location: index.php');
            exit;
        }

        $raw = $this->fetchMeals($_GET['id']);
        $meals = $this->prepareMeals($raw);

        $result = array();
        $result['meals'] = $meals;
        $result['name'] = $this->getName($_GET['id']);

        return $result;
    }

    private function prepareMeals($data) {
        $result = array();
        foreach ($data as $meal) {
            $date = explode('.', $meal->datum);
            $day = mktime(0, 0, 0, $date[1], $date[0], $date[2]);
            $type = $meal->typ;

            if (!isset($result[$day])) {
                $result["$day"] = array();
            }

            if (!isset($result["$day"]["$type"])) {
                $result["$day"]["$type"] = array();
            }

            $result["$day"]["$type"][] = $meal;

            if (!isset($result["$day"]['addition'])) {
                $result["$day"]['addition'] = array();
            }
            foreach ($meal->zusaetze as $addition) {
                $result["$day"]['addition']["{$addition->nr}"] = $addition->name;
            }

        }

        return $result;
    }

    private function fetchMeals($id) {
        $id = str_replace('/', '', $id);
        $content = json_decode(file_get_contents("http://www.studentenwerk-berlin.de/mensafeed/json/$id"));
        return $content->speisen;
    }

    function getDay($time) {
        return date('N', $time);
    }

    function dayName($time) {
        if ($time == 1) return 'Montag';
        if ($time == 2) return 'Dienstag';
        if ($time == 3) return 'Mittwoch';
        if ($time == 4) return 'Donnerstag';
        if ($time == 5) return 'Freitag';
        if ($time == 6) return 'Samstag';
        return 'Sonntag';
    }

    function getDays() {
        $days = array();

        $current = time();
        $today = true;
        $tomorrow = false;
        while (count($days) < 5) {
            $day = $this->getDay($current);
            if ($day > 5) {
                $current += 60 * 60 * 24;
                if ($tomorrow) $tomorrow = false;
                if ($today) $tomorrow = true;
                $today = false;
                continue;
            }

            if ($today) $days[] = 'Heute';
            elseif ($tomorrow) $days[] = 'Morgen';
            else {
                $days[] = $this->dayName($day);
            }

            $current += 60 * 60 * 24;
            if ($tomorrow) $tomorrow = false;
            if ($today) $tomorrow = true;
            $today = false;
            if (count($days) > 6) break;
        }
        return $days;
    }

    function getName($id) {
        $name = json_decode(file_get_contents("http://127.0.0.1:8983/solr/select/?q=id:$id&wt=json"));
        return $name->response->docs[0]->name;
    }
}

function out($s) {
    echo htmlspecialchars($s);
}

/*
header('Content-Type: text/plain');
$p = new Plan();
print_r($p->getMeals("fu1"));
*/