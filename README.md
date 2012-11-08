YouTubeAPIOauth2
================

OOP PHP Basic Framework for accessing the basic functions of the YouTube API using Oauth2 authentication

This basic framework accesses the following basic functions of the YouTube API using Oauth2 authentication:

    Add Contact to Contact List
    Sharing to Contacts
    Batch Activity Feeds for YouTube Accounts
    
The basic classes for the framework are:
    CurlClass.php
    DBClass.php

The DBClass.php allows you to connect to a mysql db, just fill out init.info with your db info and you will be set. 
All of the functional classes that allow you to do stuff on the API ie add contacts to your contact list, share a video
etc are based on the CurlClass.php. So far there are:
    