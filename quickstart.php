<?php
require_once __DIR__ . './google-api-php-client/vendor/autoload.php';

define('APPLICATION_NAME', 'Google Drive Simulator');
define('CREDENTIALS_PATH', './.credentials/drive-php-quickstart.json');
define('CLIENT_SECRET_PATH', __DIR__ . '/data/client_secret.json');
// If modifying these scopes, delete your previously saved credentials
// at ~/.credentials/drive-php-quickstart.json
define('SCOPES', implode(' ', array(
        Google_Service_Drive::DRIVE)
));

date_default_timezone_set('Asia/Kolkata'); // Prevent DateTime tz exception
if (php_sapi_name() != 'cli') {
    throw new Exception('This application must be run on the command line.');
}

/**
 * Returns an authorized API client.
 * @return Google_Client the authorized client object
 */
function getClient() {
    $client = new Google_Client();
    $client->setApplicationName(APPLICATION_NAME);
    $client->setScopes(SCOPES);
    $client->setAuthConfig(CLIENT_SECRET_PATH);
    $client->setAccessType('offline');

    // Load previously authorized credentials from a file.
    $credentialsPath = expandHomeDirectory(CREDENTIALS_PATH);
    if (file_exists($credentialsPath)) {
        $accessToken = json_decode(file_get_contents($credentialsPath), true);
    } else {
        // Request authorization from the user.
        $authUrl = $client->createAuthUrl();
        printf("Open the following link in your browser:\n%s\n", $authUrl);
        print 'Enter verification code: ';
        $authCode = trim(fgets(STDIN));

        // Exchange authorization code for an access token.
        $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);

        // Store the credentials to disk.
        if(!file_exists(dirname($credentialsPath))) {
            mkdir(dirname($credentialsPath), 0700, true);
        }
        file_put_contents($credentialsPath, json_encode($accessToken));
        printf("Credentials saved to %s\n", $credentialsPath);
    }
    $client->setAccessToken($accessToken);

    // Refresh the token if it's expired.
    if ($client->isAccessTokenExpired()) {
        $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
        file_put_contents($credentialsPath, json_encode($client->getAccessToken()));
    }
    return $client;
}

/**
 * Expands the home directory alias '~' to the full path.
 * @param string $path the path to expand.
 * @return string the expanded path.
 */
function expandHomeDirectory($path) {
    $homeDirectory = getenv('HOME');
    if (empty($homeDirectory)) {
        $homeDirectory = getenv('HOMEDRIVE') . getenv('HOMEPATH');
    }
    return str_replace('~', realpath($homeDirectory), $path);
}

// Get the API client and construct the service object.
$client = getClient();

$service = new Google_Service_Drive($client);

//Create folder
/*$fileMetadata = new Google_Service_Drive_DriveFile(array(
    'name' => 'Chaser',
    'mimeType' => 'application/vnd.google-apps.folder'));
$file = $service->files->create($fileMetadata, array(
    'fields' => 'id'));
printf("Folder ID: %s\n", $file->id);*/

//Upload file
/*$folderId = '1hmMtDvpJikb82EVDbYEsmN_n3BSf8Hr_';
$fileMetadata = new Google_Service_Drive_DriveFile(array(
    'name' => 'a.jpg',
    'parents' => array($folderId)
));
$mime = mime_content_type("a.jpg");
$content = file_get_contents('a.jpg');
$file = $service->files->create($fileMetadata, array(
    'data' => $content,
    'mimeType' => $mime,
    'uploadType' => 'multipart',
    'fields' => 'id'));
printf("File ID: %s\n", $file->id);*/

//Iterate files
$folderId = '11n31p9xP4-amyoFJt1Js3onaIfgTIgWd';
$optParams = array(
    'pageSize' => 25,
    'fields' => 'nextPageToken, files(id, name)',
    'q' => "'".$folderId."' in parents"
);
$results = $service->files->listFiles($optParams);
if (count($results->getFiles()) == 0) {
    print "No files found.\n";
} else {
    print "Files:\n";
    foreach ($results->getFiles() as $file) {
        printf("%s (%s)\n", $file->getName(), $file->getId());
    }
}
