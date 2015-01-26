<?
function user_dump($var, $all = false, $die = false)
{
    global $USER;
    if (($USER->isAdmin()) || $all) {
        ?>
        <pre><? print_r($var) ?></pre>
    <?
    }
    if ($die) {
        exit;
    }
}

function test_dump($var)
{

    ?>
    <pre><? var_dump($var) ?></pre>
    <?

}


/**
 * @param $url - string
 * @param $params array()
 */
function requestUriAddGetParams(array $params){
    $parseRes=parse_url($_REQUEST['REQUEST_URI']);
    $params=array_merge($_GET, $params);
    return $parseRes['path'].'?'.http_build_query($params);
}
?>