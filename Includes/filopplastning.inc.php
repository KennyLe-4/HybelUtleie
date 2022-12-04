<?php
if (isset($_POST['opprettAnnonse'])) {
    if (is_uploaded_file($_FILES['upload-file']['tmp_name'])) {
        $file_type = $_FILES['upload-file']['type'];
        $file_size = $_FILES['upload-file']['size'];

        $acc_file_types = array(
            "jpeg" => "image/jpeg",
            "jpg" => "image/jpg",
            "png" => "image/png"
        );
        $max_file_size = 2000000; // i bytes
        $dir = "assets/bilder";


        if (!file_exists($dir)) {
            if (!mkdir($dir, 0777, true))
                die("Cannot create directory..." . $dir);
        }

        $suffix = array_search($_FILES['upload-file']['type'], $acc_file_types);

        do {
            $filename = substr(md5(date('YmdHis')), 0, 5) . '.' . $suffix;
        } while (file_exists($dir . $filename));

        if (!in_array($file_type, $acc_file_types)) {
            $types = implode(", ", array_keys($acc_file_types));
            $messages['error'][] = "Invalid file type (only <em>" . $types . "</em> are accepted)";
        }
        if ($file_size > $max_file_size)
            $messages['error'][] = "The file size (" . round($file_size / 1048576, 2) . " MB) exceeds max file size (" . round($max_file_size / 1048576, 2) . " MB)"; // Bin. conversion

        if (empty($messages)) {
            $filepath = $dir . $filename;
            $uploaded_file = move_uploaded_file($_FILES['upload-file']['tmp_name'], $filepath);

            if (!$uploaded_file)
                $messages['error'][] = "The file could not be uploaded";
            else
                $messages['success'][] = "The file was uploaded and can be found here: <strong>" . $filepath . "</strong>";
        }
    } else {
        $messages['error'][] = "No file is selected";
    }

}
?>