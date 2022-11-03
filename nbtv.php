<?php
$id = isset($_GET['id'])?$_GET['id']:'nbtv1';//nbtv1,2,3,4,5,6
$post = json_encode([
    url => 'http://liveplay.nbtv.cn/live/'.$id.'_md.m3u8',
    playType => 'live',
    type => 'cdn',
    cdnEncrypt => 'd058c6c09b8cec3e4c8391557ac977714a35da41c4cfd40c75d6b4fdb37750b40af99e78071b72269b1614077c887c9431ce02c56739ed3a878ac3445c6352497f6ab0dec816df39192412e95509d2df4808e102380dd64ae67105a7266ec8ed580998e4e34dd62002039f872e1bda820ec4d9eaf8a11d658155d26c74125323c71e9743653e192327f3b6944ef0d219250f53718c6c38512eb9f142afe25f0838dff439d47fa695cb0eaf6473e4b4b6be62bfcbd240bc8d77d250809c1796c3cc54bdc2b70740c58cb3e39cf0ca4472d7c04c433a1daa8c6853e887aa36046c5bb959a58c0df05b81b399fad91372fea0aae029b73101c15d4bf220bbf975f7cb0a0c7ba42817d4aeebc8b8b6a3f2e83760724205a1f0eeab3dc2501d520baeab6463a0189135c00c96896e000fc28c',
    cdnIndex => 0,
    ]);
$ch = curl_init('http://em.chinamcloud.com/player/encryptUrl');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
$result = curl_exec($ch);
curl_close($ch);
$playurl = json_decode($result)->url;
header('Location:'.$playurl);
//echo $playurl;
?>