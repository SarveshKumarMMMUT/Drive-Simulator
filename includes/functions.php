<?php
define('APPLICATION_NAME', 'Google Drive Simulator');
define('CREDENTIALS_PATH', './.credentials/drive-php-quickstart.json');
define('CLIENT_SECRET_PATH', './data/client_secret.json');
define('SCOPES', implode(' ', array(
        Google_Service_Drive::DRIVE)
));

function getClient()
{
    $client = new Google_Client();
    $client->setApplicationName(APPLICATION_NAME);
    $client->setScopes(SCOPES);
    $client->setAuthConfig(CLIENT_SECRET_PATH);
    $client->setAccessType('offline');

    // Load previously authorized credentials from a file.
    $credentialsPath = expandHomeDirectory(CREDENTIALS_PATH);
    $accessToken = json_decode(file_get_contents($credentialsPath), true);
    $client->setAccessToken($accessToken);

    // Refresh the token if it's expired.
    if ($client->isAccessTokenExpired()) {
        $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
        file_put_contents($credentialsPath, json_encode($client->getAccessToken()));
    }
    return $client;
}

function expandHomeDirectory($path)
{
    $homeDirectory = getenv('HOME');
    if (empty($homeDirectory)) {
        $homeDirectory = getenv('HOMEDRIVE') . getenv('HOMEPATH');
    }
    return str_replace('~', realpath($homeDirectory), $path);
}

function upload_to_drive($filename)
{
    try {
        date_default_timezone_set('Asia/Kolkata');

// Get the API client and construct the service object.
        $client = getClient();

        $service = new Google_Service_Drive($client);

//Upload file
        $folderId = '11n31p9xP4-amyoFJt1Js3onaIfgTIgWd';
        $fileMetadata = new Google_Service_Drive_DriveFile(array(
            'name' => $filename,
            'parents' => array($folderId)
        ));
        $mime = mime_content_type("./uploads/" . $filename);
        $content = file_get_contents("./uploads/" . $filename);
        $file = $service->files->create($fileMetadata, array(
            'data' => $content,
            'mimeType' => $mime,
            'uploadType' => 'multipart',
            'fields' => 'id'));
        return true;
    } catch (Exception $ex) {
        return false;
    }
}

function iterate_drive()
{
    $files = null;
    try {
        date_default_timezone_set('Asia/Kolkata');

// Get the API client and construct the service object.
        $client = getClient();

        $service = new Google_Service_Drive($client);

//Iterate files
        $folderId = '11n31p9xP4-amyoFJt1Js3onaIfgTIgWd';

        $optParams = array(
            'pageSize' => 50,
            'fields' => 'nextPageToken, files(id, name)',
            'q' => "'" . $folderId . "' in parents"
        );
        $results = $service->files->listFiles($optParams);

        if (count($results->getFiles()) == 0) {
            return null;
        } else {
            foreach ($results->getFiles() as $file) {
                if ($files == null) {
                    $files = array(array($file->getName() => $file->getId()));
                } else {
                    array_push($files, array($file->getName() => $file->getId()));
                }
            }
        }
        return $files;
    } catch (Exception $ex) {
        return null;
    }
}