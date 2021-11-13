# YouTube-Shoutout-Wall

## A very easy-to-use shoutout wall for YouTube. 

# There is a tutorial explained for this:
https://youtu.be/qooAGRxyZDc

## Requirements

- If you would like to stream it, OBS Studio or some kind of streaming app is required.

- Web hosting for php

### Configuration

### Making a YouTube API key

- In order to do this, you will need to go to https://developers.google.com/maps/documentation/javascript/get-api-key.
Open 'config.js' in your text editor and put in the api key where it says apiKeys.
### Estilos del Odometro
https://github.hubspot.com/odometer/api/themes/

### Web hosting & using it

- For this, we will use something like, replit.com.

- Create a php web server and upload the files.

- Find your link, and at the end of it type:
- /input.php?id=
- Here, you put any channel ID which you can find in a channel URL.
- It should say something like "This user has been added to the queue" if it is successful, if you want extra confirmation go back to the wall to see if the channel has been added.
- 
- ### Nightbot
- If you have nightbot installed, if not, https://beta.nightbot.tv
- Once you're in the nightbot panel and set everything up (you should've modded Nightbot and joined channel) go to Custom and then select Commands. This will bring you to your channel commands. Add a command called !wall and put in:
- $(touser) $(urlfetch (link)/input.php?id=$(userid))

Everything should work fine now and if you have any problems then contact me by discord:
TheoCoding#0001
or Twitter: @PwnyyMadnessYT

Thanks for checking out this project and if you liked it leave it a star!
