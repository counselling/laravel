<?php
/**
 * Created by PhpStorm.
 * Written by Paul Hayter
 * Created for Counselling Ltd
 * Using Laravel framework version 5
 * Date: 04/11/2015
 * Time: 12:06
 */ ?>
<!-- sidebar nav -->
<div class="sidebar-nav">
    <div class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <span class="visible-xs navbar-brand">Main menu</span>
        </div>
        <div class="navbar-collapse collapse sidebar-navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="#">Menu Item 2</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Members <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Login</a></li>
                        <li><a href="#">Join Us</a></li>
                        <li><a href="#">Forgotten Password?</a></li>
                        <li class="divider"></li>
                        <li class="dropdown-header">Members</li>
                        <li><a href="#">Separated link</a></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
                <li><a href="#">Menu Item 4</a></li>
                <li><a href="#">Reviews <span class="badge">1,118</span></a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>
<br><br>
<img src="/images/quotes.gif">
<h4>Random Quote</h4>
<hr>
<div class="quote">{{ Inspiring::quote() }}</div>
