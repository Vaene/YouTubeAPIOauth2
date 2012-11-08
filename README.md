YouTubeAPIOauth2
================

OOP PHP Basic Framework for accessing the basic functions of the YouTube API using Oauth2 authentication

Disclaimer:
===========

This is an experimental barebones framework. I wrote it as a POC for using Oauth2 in the YouTube API because Zend's framework 
does not support Oauth2 yet, though I am sure it will soon, and YouTube's php version was not that fully developed and 
a little hard for me to get my head around. Feel free to copy and add your suggestions. The purpose of this framework is 
to not only be a good generalizeed OOP frame work for accessing YouTube's API using Oauth2 but also to be understandable
as well. Any steps you can suggest that fulfill both those missions are welcom

This framework accesses the following basic functions of the YouTube API using Oauth2 authentication:

    Add Contact to Contact List
    Sharing to Contacts
    Batch Activity Feeds for YouTube Accounts
    
The basic classes for the framework are:
    CurlClass.php
    DBClass.php

The DBClass.php allows you to connect to a mysql db, just fill out init.info with your db info and you will be set. 
All of the functional classes that allow you to do stuff on the API ie add contacts to your contact list, share a video
etc are based on the CurlClass.php. So far there are:
    AddContactClass.php
    GetAccountClass.php
    GetActivityClass.php
    ShareVideoClass.php

I will keep adding functionality by expanding this list to cover the different options listed in the API

Workflow:
=========

    