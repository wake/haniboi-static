<?php

  date_default_timezone_set('Asia/Taipei');

  if (isset ($_GET['id'])) {

    define ('SECRETKISS', true);

    include_once ('../../model/config.php');
    include_once ('../../model/data.loader.mdl.php');
    include_once ('../../model/data.controller.mdl.php');

    dbconnect ($dbconfig);

    $id = intval ($_GET['id']);

    $sql = "SELECT `photoId` FROM `hnbPhotos` WHERE `photoEnable`=1 ORDER BY `photoId` DESC";
    $res = mysql_query ($sql);

    $idx = 0;

    $prev = 0;
    $next = 0;

    while ($tmp = mysql_fetch_assoc ($res)) {

      if ($tmp['photoId'] == $id)
        $prev = $idx;

      if ($idx == $id) {
        $next = $tmp['photoId'];
        break;
      }

      $idx = $tmp['photoId'];
    }

    $sql = "SELECT tb1.*, tb2.`fileName` AS `soloName`, tb2.`filePath` AS `soloPath` FROM `hnbPhotos` AS tb1"
      . "\n LEFT JOIN `hnbFiles` AS tb2"
      . "\n ON tb1.`photoId`=tb2.`followId` AND tb2.`fileComment`='solo'"
      . "\n WHERE tb1.`photoId`='$id'"
      . "\n AND tb2.`followTable`='hnbPhotos'"
      ;

    $res = mysql_query ($sql);
    $row = mysql_fetch_assoc ($res);
  }

  $bgcolor = '#00FF00';

?><!DOCTYPE html PUBLIC "-/W3C//DTD XHTML 1.0 Transtitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://ogp.me/ns/fb#" lang="en">
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="pragma" content="no-cache" />
  <meta http-equiv="expires" content="" />
  <title>Haniboi</title>
  <meta name="Generator" content="EditPlus">
  <meta name="Author" content="Haniboi, Wakefield">
  <meta name="Keywords" content="Haniboi, Haniboy, Haniiboi, Hani, Han, Hanboy, any rock n roll for me, ARFM, Key of rock, Rock key">
  <meta name="Description" content="Vibrant and exclusive design label based in London. Original collection of apparel, accessories and novelty goods.">
  <style type="text/css">
  div { margin: 0px; padding: 0px;}
  tr { font-size: 0em;}
  </style>
</head>

<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script language="javascript">
  function fancyto (parent, id) {
    parent.$('.fancybox-iframe').attr ('src', 'event/111201/show.php?id=' + id);
  }
</script>

<table id="display-table" width="601" height="486" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="11" align="left" valign="top"><img src="/event/111201/images/photo_project_solo_with_text_01.gif" width="600" height="10" alt=""></td>
    <td><img src="/event/111201/images/Spacer.gif" width="1" height="10" alt=""></td>
  </tr>
  <tr>
    <td colspan="8" align="left" valign="top"><img src="/event/111201/images/photo_project_solo_with_text_02.gif" width="563" height="13" alt=""></td>
    <td colspan="2" rowspan="3" align="left" valign="top">
      <a id="close-photo" href="#" onclick="parent.jQuery.fancybox.close();"><img src="/event/111201/images/photo_project_solo_with_text_03.gif" width="26" height="28" border="0" alt=""></a></td>
    <td rowspan="19" align="left" valign="top"><img src="/event/111201/images/photo_project_solo_with_text_04.gif" width="11" height="475" alt=""></td>
    <td><img src="/event/111201/images/Spacer.gif" width="1" height="13" alt=""></td>
  </tr>
  <tr>
    <td rowspan="17" align="left" valign="top"><img src="/event/111201/images/photo_project_solo_with_text_05.gif" width="24" height="426" alt=""></td>
    <td colspan="2" rowspan="16" align="left" valign="top" style="background-color: <?php echo $bgcolor; ?>;">
    <div style="margin: 0px; padding: 0px; position: relative;"><img src="/<?php echo $row['soloPath']; ?>" alt="">
      <?php if ($prev > 0) : ?><a href="#" class="photo-prev" onclick="fancyto(parent, <?php echo $prev; ?>);" style="position: absolute; top: 180px; left: 5px;"><img src="/event/111201/images/left.png" border="0" alt=""></a><?php endif; ?>
      <?php if ($next > 0) : ?><a href="#" class="photo-next" onclick="fancyto(parent, <?php echo $next; ?>);" style="position: absolute; top: 180px; right: 10px;"><img src="/event/111201/images/right.png" border="0" alt=""></a><?php endif; ?>
    </div></td>
    <td colspan="5" align="left" valign="top"><img src="/event/111201/images/photo_project_solo_with_text_07.gif" width="235" height="8" alt=""></td>
    <td><img src="/event/111201/images/Spacer.gif" width="1" height="8" alt=""></td>
  </tr>
  <tr>
    <td colspan="2" rowspan="3" align="right" valign="top" style="background-color: <?php echo $bgcolor; ?>;">
      <span style="font-size: 14pt; color: #FFF; font-weight: bold; display: block; width: 29px; margin:0px; padding:0 2px 0 0; line-height: 12pt;">#</span>
      <!-- <img src="/event/111201/images/photo_project_solo_with_text_08.gif" width="31" height="73" alt=""> --></td>
    <td colspan="3" rowspan="2" align="left" valign="top" style="background-color: <?php echo $bgcolor; ?>;">
      <span style="font-size: 27pt; color: #FFF; font-weight: bold; display: block; width: 204px; margin:0px; padding:0px; font-family: Arial; line-height: 22pt;"><?php printf ("%04d", $row['photoId']); ?></span>
      <!-- <img src="/event/111201/images/photo_project_solo_with_text_09.gif" width="204" height="30" alt=""> --></td>
    <td><img src="/event/111201/images/Spacer.gif" width="1" height="7" alt=""></td>
  </tr>
  <tr>
    <td colspan="2" rowspan="6" align="left" valign="top"><img src="/event/111201/images/photo_project_solo_with_text_10.gif" width="26" height="170" alt=""></td>
    <td><img src="/event/111201/images/Spacer.gif" width="1" height="23" alt=""></td>
  </tr>
  <tr>
    <td colspan="3" align="left" valign="top"><img src="/event/111201/images/photo_project_solo_with_text_11.gif" width="204" height="43" alt=""></td>
    <td><img src="/event/111201/images/Spacer.gif" width="1" height="43" alt=""></td>
  </tr>
  <tr>
    <td rowspan="14" align="left" valign="top"><img src="/event/111201/images/photo_project_solo_with_text_12.gif" width="15" height="381" alt=""></td>
    <td colspan="4" align="left" valign="top" style="background-color: <?php echo $bgcolor; ?>;">
      <span style="font-size: 32pt; color: #FFF; font-weight: bold; display: block; width: 204px; margin:0px; padding:0px; font-family: Arial; line-height: 22pt;">
      <?php echo $row['photoName1']; ?></span>
      <!-- <img src="/event/111201/images/photo_project_solo_with_text_13.gif" width="220" height="41" alt=""> --></td>
    <td><img src="/event/111201/images/Spacer.gif" width="1" height="41" alt=""></td>
  </tr>
  <tr>
    <td colspan="4" align="left" valign="top"><img src="/event/111201/images/photo_project_solo_with_text_14.gif" width="220" height="5" alt=""></td>
    <td><img src="/event/111201/images/Spacer.gif" width="1" height="5" alt=""></td>
  </tr>
  <tr>
    <td colspan="4" align="left" valign="top" style="background-color: <?php echo $bgcolor; ?>;">
      <span style="font-size: 32pt; color: #FFF; font-weight: bold; display: block; width: 204px; margin:0px; padding:0px; font-family: Arial; line-height: 22pt;">
      <?php echo $row['photoName2']; ?></span>
      <!-- <img src="/event/111201/images/photo_project_solo_with_text_15.gif" width="220" height="42" alt=""> --></td>
    <td><img src="/event/111201/images/Spacer.gif" width="1" height="42" alt=""></td>
  </tr>
  <tr>
    <td colspan="4" align="left" valign="top"><img src="/event/111201/images/photo_project_solo_with_text_16.gif" width="220" height="16" alt=""></td>
    <td><img src="/event/111201/images/Spacer.gif" width="1" height="16" alt=""></td>
  </tr>
  <tr>
    <td colspan="5" align="left" valign="top"><img src="/event/111201/images/photo_project_solo_with_text_17.gif" width="221" height="24" alt=""></td>
    <td rowspan="10" align="left" valign="top"><img src="/event/111201/images/photo_project_solo_with_text_18.gif" width="25" height="277" alt=""></td>
    <td><img src="/event/111201/images/Spacer.gif" width="1" height="24" alt=""></td>
  </tr>
  <tr>
    <td colspan="5" align="left" valign="top"><img src="/event/111201/images/photo_project_solo_with_text_19.gif" width="221" height="12" alt=""></td>
    <td><img src="/event/111201/images/Spacer.gif" width="1" height="12" alt=""></td>
  </tr>
  <tr>
    <td colspan="5" rowspan="4" align="left" valign="top" style="background-color: <?php echo $bgcolor; ?>;">
      <span style="font-size: 32pt; color: #FFF; font-weight: bold; display: block; width: 204px; margin:0px; padding:0px; font-family: Arial; line-height: 32pt;">
      <?php echo $row['photoGraphed']; ?></span>
      <img src="/event/111201/images/photo_project_solo_with_text_21.gif" width="221" height="9" alt="">
      <span style="font-size: 14pt; color: #FFF; font-weight: bold; display: block; width: 204px; margin:0px; padding:0px; font-family: Arial; line-height: 14pt;">
      <?php $d = explode ('-', $row['photoDate']); echo "$d[1] / $d[2] / $d[0]"; ?></span>
      <!-- <img src="/event/111201/images/photo_project_solo_with_text_20.gif" width="221" height="47" alt=""> --></td>
    <td><img src="/event/111201/images/Spacer.gif" width="1" height="47" alt=""></td>
  </tr>
  <tr>
    <!--
    <td colspan="5" align="left" valign="top"><img src="/event/111201/images/photo_project_solo_with_text_21.gif" width="221" height="9" alt=""></td>
    -->
    <td><img src="/event/111201/images/Spacer.gif" width="1" height="9" alt=""></td>
  </tr>
  <tr>
    <!--
    <td colspan="5" align="left" valign="top" style="background-color: <?php echo $bgcolor; ?>;">
      <span style="font-size: 14pt; color: #FFF; font-weight: bold; display: block; width: 204px; margin:0px; padding:0px; font-family: Arial; line-height: 14pt;">
      <?php $d = explode ('-', $row['photoDate']); echo "$d[1] / $d[2] / $d[0]"; ?></span>
    </td>
    -->
    <td><img src="/event/111201/images/Spacer.gif" width="1" height="26" alt=""></td>
  </tr>
  <tr>
    <!--
    <td colspan="5" align="left" valign="top"><img src="/event/111201/images/photo_project_solo_with_text_23.gif" width="221" height="69" alt=""></td>
    -->
    <td><img src="/event/111201/images/Spacer.gif" width="1" height="69" alt=""></td>
  </tr>

  <tr>
    <td colspan="5" align="left" valign="top">

      <table cellpadding="0" cellspacing="0" border="0" bgcolor="<?php echo $bgcolor; ?>" width="221" height="29">
        <tr>
          <td>
            <div style="width: 110px; overflow: hidden;">
              <iframe allowtransparency="true" src="//platform.twitter.com/widgets/tweet_button.html?url=<?php echo urlencode ('http://haniboi.com/event-share.php?s=twitter&v=photoevent&id=' . $row['photoId']); ?>&counturl=<?php echo urlencode ('http://haniboi.com/event-share.php?s=twitter&v=photoevent&id=' . $row['photoId']); ?>" frameborder="0" scrolling="no" style="width:110px; height:29px;"></iframe>
            </div>
          </td>
          <td>
            <div style="width: 110px; position: relative; top: -5px;">
              <fb:like href="<?php echo urlencode ('http://haniboi.com/event-share.php?s=facebook&v=photoevent&id=' . $row['photoId']); ?>" send="false" layout="button_count" width="110" show_faces="false"></fb:like>
            </div>
          </td>
        </tr>
      </table>

    </td>
    <td><img src="/event/111201/images/Spacer.gif" width="1" height="29" alt=""></td>
  </tr>

  <tr>
    <td colspan="5" rowspan="3" align="left" valign="top"><img src="/event/111201/images/photo_project_solo_with_text_27.gif" width="221" height="61" alt=""></td>
    <td><img src="/event/111201/images/Spacer.gif" width="1" height="4" alt=""></td>
  </tr>
  <tr>
    <td colspan="2" align="left" valign="top"><img src="/event/111201/images/photo_project_solo_with_text_28.gif" width="304" height="21" alt=""></td>
    <td><img src="/event/111201/images/Spacer.gif" width="1" height="21" alt=""></td>
  </tr>
  <tr>
    <td colspan="2" align="left" valign="top">
      <div style="font-size:0pt; height:0px; line-height:0em; margin:0px; padding:0px; position:relative;"><a style="position: absolute; left:280px; top:10px;" href="/?view=project" target="_top"><img src="/event/111201/images/what_logo.png?130110" border="0" width="255" height="24" alt=""></a></div>
      <a href="http://www.facebook.com/pages/Haniboi/182827918489525" target="_blank"><img src="/event/111201/images/photo_project_solo_with_text_29.gif" border="0" width="232" height="36" alt=""></a>
    </td>
    <td align="left" valign="top"><img src="/event/111201/images/photo_project_solo_with_text_30.gif" width="96" height="36" alt=""></td>
    <td><img src="/event/111201/images/Spacer.gif" width="1" height="36" alt=""></td>
  </tr>
  <tr>
    <td><img src="/event/111201/images/Spacer.gif" width="24" height="1" alt=""></td>
    <td><img src="/event/111201/images/Spacer.gif" width="208" height="1" alt=""></td>
    <td><img src="/event/111201/images/Spacer.gif" width="96" height="1" alt=""></td>
    <td><img src="/event/111201/images/Spacer.gif" width="15" height="1" alt=""></td>
    <td><img src="/event/111201/images/Spacer.gif" width="16" height="1" alt=""></td>
    <td><img src="/event/111201/images/Spacer.gif" width="59" height="1" alt=""></td>
    <td><img src="/event/111201/images/Spacer.gif" width="103" height="1" alt=""></td>
    <td><img src="/event/111201/images/Spacer.gif" width="42" height="1" alt=""></td>
    <td><img src="/event/111201/images/Spacer.gif" width="1" height="1" alt=""></td>
    <td><img src="/event/111201/images/Spacer.gif" width="25" height="1" alt=""></td>
    <td><img src="/event/111201/images/Spacer.gif" width="11" height="1" alt=""></td>
    <td></td>
  </tr>
</table>
</body>
</html>
