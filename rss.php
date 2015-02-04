<?php
    header('Content-Type: application/xml');

    require('JACKED/jacked_conf.php');
    $JACKED = new JACKED('Blag');

    $posts = $JACKED->Blag->getPosts();

?>
<?xml version="1.0" encoding="utf-8"?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
    <channel>
        <title><?php echo $JACKED->config->client_name; ?></title>
        <link><?php echo $JACKED->config->base_url; ?></link>
        <description>Warranty Now Void. It's a website. With poop jokes and stuff. Read it. Or don't. I'm not your dad.</description>
        <atom:link href="<?php echo $JACKED->config->base_url; ?>feed" rel="self" type="application/rss+xml" />
        <image>
            <link><?php echo $JACKED->config->base_url; ?></link>
            <title>Warranty Now Void</title>
            <url><?php echo $JACKED->config->base_url; ?>assets/ico/apple-touch-icon-144-precomposed.png</url>
            <description>Warranty Now Void. It's a website. With poop jokes and stuff. Read it. Or don't. I'm not your dad.</description>
            <height>144</height>
            <width>144</width>
        </image>
        <language>en-us</language>
        <copyright>Copyright (c) 2006 - <?php echo date('Y'); ?> Warranty Now Void</copyright>
        <generator>JACKED Blag v1.1</generator>
        <lastBuildDate><?php echo date('r'); ?></lastBuildDate>
        <?php
            foreach($posts as $post){
        ?>

        <item>
            <title><![CDATA[ <?php echo $post->title; ?> ]]></title>
            <link><?php echo $JACKED->config->base_url . 'post/' . $post->guid; ?></link>
            <description><![CDATA[ <?php echo ($post->thumbnail? '<img src="' . $JACKED->config->base_url . 'assets/img/lol/' . $post->thumbnail . '" />': '') . $post->headline; ?> ]]></description>
            <pubDate><?php echo date('r', $post->posted); ?></pubDate>
            <guid isPermaLink="true"><?php echo $JACKED->config->base_url . 'post/' . $post->guid; ?></guid>
        </item>
        <?php 
            }
        ?>

    </channel>
</rss>