<!doctype html>
<html>
<head>
    <title>DQMJInfo</title>
    <!-- META -->
    <meta charset="utf-8">
    <!-- send empty favicon fallback to prevent user's browser hitting the server for lots of favicon requests resulting in 404s -->
    <link rel="icon" href="data:;base64,=">
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo Config::get('URL'); ?>css/application.css" />
</head>
<body>
    <!-- wrapper, to center website -->
    <div class="wrapper">

    <div id="navigation">
        <a href="<?php echo Config::get('URL'); ?>">Home</a>
         | 
        <a href="">Monsters</a>:
        <a href="">X</a>, 
        <a href="">S</a>, 
        <a href="">A</a>, 
        <a href="">B</a>, 
        <a href="">C</a>, 
        <a href="">D</a>, 
        <a href="">E</a>, 
        <a href="">F</a>, 
        <a href="">Slime</a>, 
        <a href="">Dragon</a>, 
        <a href="">Nature</a>, 
        <a href="">Beast</a>, 
        <a href="">Material</a>, 
        <a href="">Demon</a>, 
        <a href="">Undead</a>, 
        <a href="">Incarni</a>
         | 
        <a href="">NPC Scouts</a>
        <br>
        <a href="">Skillsets</a>
         | 
        <a href="">Skills</a>: 
        <a href="">Attack</a>, 
        <a href="">Healing</a>, 
        <a href="">Passive</a>, 
        <a href="">Spell</a>, 
        <a href="">Support</a>
         | 
        <a href="">Traits</a>
         | 
        <a href="">Resistances</a>
         | 
        <a href="">Find Monsters</a>
         | 
        <a href="">Create Monster Team</a>
         | 
        <a href="">To Do</a>
         | 
        <a href="">Credits</a>
        <?php if (Session::userIsLoggedIn()) { ?>
            <br>
            <a href="/dashboard">Dashboard</a>
        <?php } ?>
    </div>
