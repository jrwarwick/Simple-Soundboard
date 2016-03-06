# Simple Single Page Soundboard
This code creates a Soundboard on a single page using PHP, Javascript, JQuery, HTML5 and CSS. Original author was motivated to create when Soundboard.com ignored two feature requests. This version is better than Soundboard.com in at least 4 ways:
  1. Loads way faster.
  2. Tablet and Mobile friendly. 
  3. Sorts alphabetically automatically.  
  4. You can play multiple audio samples simultaneously. 
  5. Independent background loop.

### Getting Started
  1. Create a new folder and place all the audio files you wish to have on the soundboard.
  2. On the top of the index.php file define that folder where is says $audiodirectory. 
  3. Deploy to a web server that supports PHP (most do). 

### Some Ideas For Your Soundboard
  1. Search for "CSS Button Generator" to create your own custom super cool looking buttons. Place that CSS into the soundboard.css file.  
  2. I set the preload: none. This is because I have 200+ audio files and want the initial page draw to be fast. Remove this line if you prefer the drops load on page draw and not on play. 
  
### Credits
Original by digitalcolony
Modifications by JRWarwick

### License
Original license assumed to be MIT, and this edition also MIT licensed. Refer to LICENSE.txt .

