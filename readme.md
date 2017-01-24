# Acada

A video embed application built with Laravel and Angular 1.

## Application Features

1.  Authentication: Registration Sign In social mediation authentication
2.  User Profile Management
3.  YouTube video embeding - Authenticated user only
4.  Browse all videos
5.  Browse videos by category
6.  View single video

## Approach to the Solution

1.  Authentiation/Registration with social mediation for this i used laravel's socialite package to enable login/registration for the       app. Socialite currently supports a vast array of providers.

2.  Youtube video embeding: for this a user is provided with a pup up where he provides the youtubes videos url. The code behind takes         this url and extracts the video ID whih is saved into a database table.

3. Browse all videos: Am ajax request is sent to the server to get all videos.

4. Browse videos by category: A user enters a video title or it's category an ajax all is made to the server to retrieve the videos. I      hard coded some <b>categories</b> in the database.

<p><b>This might not be the best approach, but it solves the problem of having to have a separate host for  videos </b></p>

## Contributing

Thank you for considering contributing to Acada, request fork by sending an email to Daniel Uche on at dank.uche@yahoo.com
