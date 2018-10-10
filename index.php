<h1>Nexmo Knowledgebase</h1>

<form name="f" method="get" action="index.php">
<label for="query">Query</label>
<input type="text" name="query" id="query" />
<input type="submit" value="Search" />
</form>

<?php

require "vendor/autoload.php";

$url = 'https://nexmo.zendesk.com/api/v2/help_center/articles/search.json?per_page=25&locale=en-US&query=';

$client = new \GuzzleHttp\Client();
$res = $client->request('GET', $url . urlencode($_GET['query']));

$json = $res->getBody();

// echo $json;

$data = json_decode($json, true);
// var_dump($data);

foreach($data['results'] as $item) {
    echo "<p>";
    echo "<a href=\"" . $item['html_url'] . "\" target=\"_blank\">";
    echo $item['title'];
    echo "</a>";
    echo "</p>\n";
}
