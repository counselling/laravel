<?php
/**
 * Created by PhpStorm.
 * Written by Paul Hayter
 * Created for Counselling Ltd
 * Using Laravel framework version 5
 * Date: 04/11/2015
 * Time: 11:59
 */ ?>
        <!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body>
<div class="container">

    <header class="row">
        @include('includes.header')
    </header>

    <div class="row">

        <!-- sidebar content -->
        <div id="sidebar" class="col-md-3" >
            @include('includes.sidebar_left')
        </div>

        <!-- main content -->
        <div id="content" class="col-md-8">
            @yield('content')
        </div>

        <div class="col-md-1"><p></p></div>

    </div>

    <footer class="row">
        @include('includes.footer')
    </footer>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="/css/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
