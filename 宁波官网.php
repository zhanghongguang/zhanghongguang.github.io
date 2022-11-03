<?php
$id = $_GET['id'];//id=1 2 3 4 5
$d = json_decode(file_get_contents('http://media.cloud.nbtv.cn:84/nbtv/media/playerJson/liveChannel/8b2663864ab04a0799acd60e4b91f677_PlayerParamProfile.json'));
$cdn=( $d->paramsConfig->cdnConfigEncrypt);
$post_url = "http://em.chinamcloud.com/player/encryptUrl";
$postdata='{"url":"http://liveplay.nbtv.cn/live/nbtv'.$id.'_md.m3u8","playType":"live","type":"cdn","cdnEncrypt":"'.$cdn.'","cdnIndex":0}';
$headerArr= array(
'Accept-Language: zh-CN,zh;q=0.9',
'Connection: keep-alive',
'Content-Length: 720',
'Content-Type: application/json;charset=UTF-8',
'Host: em.chinamcloud.com',
'Origin: http://www.nbtv.cn',
'Referer: http://www.nbtv.cn/gbds/folder8458/NBTV1/index.shtml',
);
$UserAgent = 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36';
              //Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $post_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_ENCODING, " ");
curl_setopt($ch, CURLOPT_HTTPHEADER, $headerArr);
curl_setopt($ch, CURLOPT_USERAGENT, $UserAgent);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
$content = curl_exec($ch);
curl_close($ch); // 关闭CURL会话
$json=json_decode($content);
$playurl =$json->url;
echo $playurl;
header('Location:'.$playurl);
?>
