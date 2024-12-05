<?php

namespace App;

use Exception;

class View
{
    static function loadTemplating($file, $data)
    {
        // Extract data variables for use in the view
        extract($data);

        if (file_exists($file)) {
            include platformConsistentPathResove($file);
        } else {
            throw new Exception('File Not Found: ' . $file);
        }
    }

    static function loadView($view, $data = [])
    {
        // Include the header file
        View::loadTemplating(__DIR__ . "/../views/partials/header.php", $data);

        // Include the view file
        View::loadTemplating(__DIR__ . "/../views/$view.php", $data);

        // Include the footer file
        View::loadTemplating(__DIR__ . "/../views/partials/footer.php", $data);
    }
}
