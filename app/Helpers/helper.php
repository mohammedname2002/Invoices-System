<?php

use App\Models\Course;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


 function findByuuid($model,$uuid,$relations=[],$params=['*'],$count=[],$sum=[])
{
    $query = $model::with($relations)->select($params)->withCount($count);

    if (!empty($sum)) {
        $query->withSum($sum[0], $sum[1] ?? null);
    }

    return $query->where("uuid",$uuid)->first();


}

function findById($model,$id,$relations=[],$params=['*'],$count=[],$sum=[])
{
    $query = $model::with($relations)->select($params)->withCount($count);

    if (!empty($sum)) {
        $query->withSum($sum[0], $sum[1] ?? null);
    }

    return $query->findOrFail($id);


}

function storeImage($admin , $path, $file)
{
    $convertedString = str_replace(' ', '_', $admin);

    $imageName = $convertedString . '.' . $file->getClientOriginalExtension();
    Storage::disk('public')->putFileAs($path, $file, $imageName);
    return $imageName;
}

function editImage($path, $file , $oldImage)
{
    deleteImage($oldImage);
    $imageName = Str::random() . '.' . $file->getClientOriginalExtension();
    Storage::disk('public')->putFileAs($path, $file, $imageName);
    return $imageName;
}
function editImage2($admin,$path, $file , $oldImage)
{
    deleteImage($oldImage);
    $convertedString = str_replace(' ', '_', $admin);

    $imageName = $convertedString . '.' . $file->getClientOriginalExtension();
    Storage::disk('public')->putFileAs($path, $file, $imageName);
    return $imageName;
}

function deleteImage($oldImage)
{
    $exists = Storage::disk('public')->exists(substr($oldImage,8));



    if ($exists) {
        $exists = Storage::disk('public')->delete(substr($oldImage,8));
        return true;
    }
    return false;
}






function  humanTiming ($time)
{

    $time = time() - $time; // to get the time since that moment
    $time = ($time<1)? 1 : $time;
    $tokens = array (
        31536000 => 'سنة',
        2592000 => 'شهر',
        604800 => 'اسبوع',
        86400 => 'يوم',
        3600 => 'ساعة',
        60 => 'دقيقة',
        1 => 'ثانية'
    );

    foreach ($tokens as $unit => $text) {
        if ($time < $unit) continue;
        $numberOfUnits = floor($time / $unit);
        return $numberOfUnits.' '.$text;
    }

}

function getOrderByTable($order, $columns, $allowed = [])
{
    $orderColumn = "id";
    $dir = "desc";
    if (isset($order[0]["column"]) && $order[0]["column"])
        $orderColumn = (isset($columns[$order[0]["column"]]["name"]) && in_array($columns[$order[0]["column"]]["name"], $allowed) ? $columns[$order[0]["column"]]["name"] : "");

    if (isset($order[0]["dir"]) && $order[0]["dir"])
        $dir = in_array($order[0]["dir"], ["asc", "desc"]) ? $order[0]["dir"] : "desc";
    return [$orderColumn, $dir];
}

function getRoleClass($action, $roleActions, $roleActionsDefault)
{
    if (in_array($action, $roleActions) && in_array($action, $roleActionsDefault))
        return "blue";
    if (in_array($action, $roleActions) && !in_array($action, $roleActionsDefault))
        return "green";
    if (!in_array($action, $roleActions) && in_array($action, $roleActionsDefault))
        return "red";
    if (!in_array($action, $roleActions) && !in_array($action, $roleActionsDefault))
        return "black";
}

function generateBreadcrumbs($arr)
{
    $result = '';
    foreach ($arr as $key => $value) {
        if ($value || $key == trans("cp.dashboard"))
            $result .= '<li><a href="' . $value . '">' . $key . '</a><i class="fa fa-circle"></i></li>';
        else
            $result .= "<li><span>" . $key . "</span></li>";
    }

    return $result;
}

function escape_like($str)
{
    $temp = DB::getPdo()->quote($str);
    $temp = substr($temp, 1);
    $temp = substr($temp, 0, -1);
    return $temp;
}

function loadImage($fileName, $dest, $width = 0, $height = 0, $q = 50, $path = "")
{
    if (!$path)
        $path = url("uploads/" . $dest . "/" . $fileName);
    $result = url("") . "/thumb/timthumb.php?src=" . $path . "&zc=1&q=" . $q;
    if ($width)
        $result .= "&w=" . $width;
    if ($height)
        $result .= "&h=" . $height;
    return $result;
}

function detectDevice()
{
    $userAgent = $_SERVER["HTTP_USER_AGENT"];
    $devicesTypes = array(
        "computer" => array("msie 10", "msie 9", "msie 8", "windows.*firefox", "windows.*chrome", "x11.*chrome", "x11.*firefox", "macintosh.*chrome", "macintosh.*firefox", "opera"),
        "tablet" => array("tablet", "android", "ipad", "tablet.*firefox"),
        "mobile" => array("mobile ", "android.*mobile", "iphone", "ipod", "opera mobi", "opera mini"),
        "bot" => array("googlebot", "mediapartners-google", "adsbot-google", "duckduckbot", "msnbot", "bingbot", "ask", "facebook", "yahoo", "addthis")
    );
    foreach ($devicesTypes as $deviceType => $devices) {
        foreach ($devices as $device) {
            if (preg_match("/" . $device . "/i", $userAgent)) {
                $deviceName = $deviceType;
            }
        }
    }
    return $deviceName;
}
// public static function getTimeLeft($ptime)
// {
//     $etime = time() - strtotime($ptime);

//     if ($etime < 1) {
//         return '0 ثانية';
//     }

//     $a = array(365 * 24 * 60 * 60 => 'سنة',
//         30 * 24 * 60 * 60 => 'شهر',
// //        7 * 24 * 60 * 60 => 'اسبوع',
//         24 * 3  * 60 * 60 => '3 ايام',
//         24 * 2  * 60 * 60 => 'يومان',
//         24 * 60 * 60 => 'يوم',
//         60 * 60 => 'ساعة',
//         60 => 'دقيقة',
//         1 => 'ثانية'
//     );

//     foreach ($a as $secs => $str) {
//         $d = $etime / $secs;
//         if ($d >= 1) {
//             $r = round($d);
//             return 'منذ ' . $r . ' ' . $str;
//         }
//     }
// }

// cUrl handler to ping the Sitemap submission URLs for Search Engines…
function myCurl($url)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    return $httpCode;
}

function sslStream()
{
    $arrContextOptions = array(
        "ssl" => array(
            "verify_peer" => false,
            "verify_peer_name" => false,
        ),
    );

    return stream_context_create($arrContextOptions);
}

function clean($string)
{
    $string = str_replace(' ', '-', trim($string)); // Replaces all spaces with hyphens.

    //$string = preg_replace("/[^A-Za-z0-9_\s-ءاأإآؤئبتثجحخدذرزسشصضطظعغفقكلمنهويةى]#u/", "", $string);
    $string = preg_replace("/[^A-Za-z0-9_\s-ءاأإآؤئبتثجحخدذرزسشصضطظعغفقكلمنهويةى]/u", "", $string);

    // Remove multiple dashes or whitespaces
    $string = preg_replace("/[\s-]+/", " ", $string);

    // Convert whitespaces and underscore to the given separator
    $string = preg_replace("/[\s_]/", '-', $string);

    //return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

    return $string;
}

function getNumber($number)
{
    if ($number < 1000)
        return $number;

    if ($number < 1000000)
        return ((int)($number / 1000)) . "," . ((int)($number % 1000)) . "K";

    return ($number / 1000000) . "," . ($number % 1000000) . "M";
}

// for xx clean
/**
 * XSS Clean
 *
 * **************************************************************
 * *********** This function and other functions that it uses
 * *********** are taken from Codeigniter 2.1.3 and modified
 * *********** them to our needs. In turn, I have taken this from
 * *********** JasonMortonNZ.
 ***************************************************************
 *
 *
 * Sanitizes data so that Cross Site Scripting Hacks can be
 * prevented.  This function does a fair amount of work but
 * it is extremely thorough, designed to prevent even the
 * most obscure XSS attempts.  Nothing is ever 100% foolproof,
 * of course, but I haven't been able to get anything passed
 * the filter.
 *
 * Note: This function should only be used to deal with data
 * upon submission.  It's not something that should
 * be used for general runtime processing.
 *
 * This function was based in part on some code and ideas I
 * got from Bitflux: http://channel.bitflux.ch/wiki/XSS_Prevention
 *
 * To help develop this script I used this great list of
 * vulnerabilities along with a few other hacks I've
 * harvested from examining vulnerabilities in other programs:
 * http://ha.ckers.org/xss.html
 *
 * @param   mixed   string or array
 * @param   bool
 * @return  string
 */
function xss_clean($str, $is_image = FALSE)
{
    /*
     * Is the string an array?
     *
     */
    if (is_array($str)) {
        while (list($key) = each($str)) {
            $str[$key] = xss_clean($str[$key]);
        }
        return $str;
    }
    /*
     * Remove Invisible Characters
     */
    $str = remove_invisible_characters($str);
    // Validate Entities in URLs
    $str = validate_entities($str);
    /*
     * URL Decode
     *
     * Just in case stuff like this is submitted:
     *
     * <a href="http://%77%77%77%2E%67%6F%6F%67%6C%65%2E%63%6F%6D">Google</a>
     *
     * Note: Use rawurldecode() so it does not remove plus signs
     *
     */
    $str = rawurldecode($str);
    /*
     * Convert character entities to ASCII
     *
     * This permits our tests below to work reliably.
     * We only convert entities that are within tags since
     * these are the ones that will pose security problems.
     *
     */
    $str = preg_replace_callback("/[a-z]+=([\'\"]).*?\\1/si", function ($match) {
        return str_replace(array('>', '<', '\\'), array('&gt;', '&lt;', '\\\\'), $match[0]);
    }, $str);
    $str = preg_replace_callback("/<\w+.*?(?=>|<|$)/si", 'entity_decode', $str);
    /*
     * Remove Invisible Characters Again!
     */
    $str = remove_invisible_characters($str);
    /*
     * Convert all tabs to spaces
     *
     * This prevents strings like this: ja  vascript
     * NOTE: we deal with spaces between characters later.
     * NOTE: preg_replace was found to be amazingly slow here on
     * large blocks of data, so we use str_replace.
     */
    if (strpos($str, "\t") !== FALSE) {
        $str = str_replace("\t", ' ', $str);
    }
    /*
     * Capture converted string for later comparison
     */
    $converted_string = $str;
    // Remove Strings that are never allowed
    $str = do_never_allowed($str);
    /*
     * Makes PHP tags safe
     *
     * Note: XML tags are inadvertently replaced too:
     *
     * <?xml
     *
     * But it doesn't seem to pose a problem.
     */
    if ($is_image === TRUE) {
        // Images have a tendency to have the PHP short opening and
        // closing tags every so often so we skip those and only
        // do the long opening tags.
        $str = preg_replace('/<\?(php)/i', "&lt;?\\1", $str);
    } else {
        $str = str_replace(array('<?', '?' . '>'), array('&lt;?', '?&gt;'), $str);
    }
    /*
     * Compact any exploded words
     *
     * This corrects words like:  j a v a s c r i p t
     * These words are compacted back to their correct state.
     */
    $words = array(
        'javascript', 'expression', 'vbscript', 'script', 'base64',
        'applet', 'alert', 'document', 'write', 'cookie', 'window'
    );
    foreach ($words as $word) {
        $temp = '';
        for ($i = 0, $wordlen = strlen($word); $i < $wordlen; $i++) {
            $temp .= substr($word, $i, 1) . "\s*";
        }
        // We only want to do this when it is followed by a non-word character
        // That way valid stuff like "dealer to" does not become "dealerto"
        $str = preg_replace_callback('#(' . substr($temp, 0, -3) . ')(\W)#is', function ($matches) {
            return preg_replace('/\s+/s', '', $matches[1]) . $matches[2];
        }, $str);
    }
    /*
     * Remove disallowed Javascript in links or img tags
     * We used to do some version comparisons and use of stripos for PHP5,
     * but it is dog slow compared to these simplified non-capturing
     * preg_match(), especially if the pattern exists in the string
     */
    do {
        $original = $str;
        if (preg_match("/<a/i", $str)) {
            $str = preg_replace_callback("#<a\s+([^>]*?)(>|$)#si", function ($match) {
                return str_replace(
                    $match[1],
                    preg_replace(
                        '#href=.*?(alert\(|alert&\#40;|javascript\:|livescript\:|mocha\:|charset\=|window\.|document\.|\.cookie|<script|<xss|data\s*:)#si',
                        '',
                        filter_attributes(str_replace(array('<', '>'), '', $match[1]))
                    ),
                    $match[0]
                );
            }, $str);
        }
        if (preg_match("/<img/i", $str)) {
            $str = preg_replace_callback("#<img\s+([^>]*?)(\s?/?>|$)#si", function ($match) {
return str_replace(
$match[1],
preg_replace(
'#src=.*?(alert\(|alert&\#40;|javascript\:|livescript\:|mocha\:|charset\=|window\.|document\.|\.cookie|
<script|<xss|base64\s*,)#si', '' , filter_attributes(str_replace(array('<', '>' ), '' , $match[1])) ), $match[0] ); },
    $str); } if (preg_match("/script/i", $str) OR preg_match("/xss/i", $str)) {
    $str=preg_replace("#<(/*)(script|xss)(.*?)\>#si", '[removed]', $str);
    }
    } while ($original != $str);
    unset($original);
    // Remove evil attributes such as style, onclick and xmlns
    $str = remove_evil_attributes($str, $is_image);
    /*
    * Sanitize naughty HTML elements
    *
    * If a tag containing any of the words in the list
    * below is found, the tag gets converted to entities.
    *
    * So this: <blink>
        * Becomes: &lt;blink&gt;

        );
        /**
        * List of never allowed regex replacement
        */
        $never_allowed_regex = array(
        'javascript\s*:',
        'expression\s*(\(|&\#40;)', // CSS and IE
        'vbscript\s*:', // IE, surprise!
        'Redirect\s+302',
        "([\"'])?data\s*:[^\\1]*?base64[^\\1]*?,[^\\1]*?\\1?"
        );
        $str = str_replace(array_keys($never_allowed_str), $never_allowed_str, $str);
        foreach ($never_allowed_regex as $regex) {
        $str = preg_replace('#' . $regex . '#is', '[removed]', $str);
        }
        return $str;
        }//do_never_allowed
        /*
        * Remove Evil HTML Attributes (like evenhandlers and style)
        *
        * It removes the evil attribute and either:
        * - Everything up until a space
        * For example, everything between the pipes:
        * <a |style=document.write('hello');alert('world');| class=link>
            * - Everything inside the quotes
            * For example, everything between the pipes:
            * <a |style="document.write('hello'); alert('world');" | class="link">
                *
                * @param string $str The string to check
                * @param boolean $is_image TRUE if this is an image
                * @return string The string with the evil attributes removed
                */